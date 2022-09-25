<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Providers\RouteServiceProvider;

class DashboardController
{
    public function show()
    {
        $dashboard = session('activeDashboard');

        if (! $dashboard) {
            $dashboard = auth()->user()->activeDashboards()->first();
        }

        if (! $dashboard) {
            abort(404);
        }

        return view('dashboard', [
            'dashboard' => $dashboard,
        ]);
    }

    public function switch(int $dashboardId)
    {
        $dashboard = Dashboard::findOrFail($dashboardId);

        session()->put('activeDashboard', $dashboard);

        return redirect(RouteServiceProvider::HOME);
    }
}
