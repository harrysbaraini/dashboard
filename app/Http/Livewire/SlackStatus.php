<?php

namespace App\Http\Livewire;

use App\Widget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class SlackStatus extends Widget
{
    public function render()
    {
        return view('livewire.slack-status');
    }

    public function getStarredChannelsProperty(): Collection
    {
        $response = $this->callSlack('GET', 'stars.list');

        if (! $response['ok']) {
            return collect();
        }

        return collect(data_get($response, 'items', []))
            ->map(function ($item) {
                if ($item['type'] !== 'channel') {
                    return null;
                }

                $conversationInfo = $this->callSlack('GET', 'conversations.info', [
                    'query' => [
                        'channel' => $item['channel'],
                    ],
                ]);

                if (! $conversationInfo['ok']) {
                    return null;
                }

                $channelId = data_get($conversationInfo, 'channel.id');

                $conversationHistory = $this->callSlack('GET', 'conversations.history', [
                    'query' => [
                        'channel' => $channelId,
                        'oldest' => data_get($conversationInfo, 'channel.last_read'),
                    ],
                ]);

                return [
                    'id' => $channelId,
                    'label' => data_get($conversationInfo, 'channel.name'),
                    'unread' => count(data_get($conversationHistory, 'messages', [])),
                    'link' => sprintf('slack://channel?id=%s&team=%s', $channelId, data_get($conversationInfo, 'channel.context_team_id')),
                ];
            })
            ->filter(fn($item) => !is_null($item));
    }

    protected function callSlack(string $method, string $endpoint, array $options = []): array
    {
        $bearer = config('services.slack.user_token');

        $result = Http::withHeaders([
            'Authorization' => "Bearer {$bearer}",
            'Content-Type' => 'application/json',
        ])->send($method, "https://slack.com/api/${endpoint}", $options);

        return $result->json();
    }
}
