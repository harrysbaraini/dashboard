<?php declare(strict_types=1);

namespace App\Http\Controllers;

class DashboardController
{
    public function show()
    {
        if (! $dashboard = auth()->user()->dashboards()->where('active', true)->first()) {
            abort(404);
        }

        return view('dashboard', [
            'dashboard' => $dashboard,
        ]);
    }
}
