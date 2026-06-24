<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Purchasing;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Sample statistics data for the dashboard widgets
        // $stats = [
        //     'total_orders' => 8052,
        //     'total_revenue' => '$6.2K',
        //     'new_users' => User::count(),
        //     'sold_items' => 956,
        //     'total_visits' => '12M',
        //     'total_returns' => 178
        // ];
        $stats = [
            'total_amount' => Purchasing::sum('amount'),
            'pending_purchasings' => Purchasing::where('status', 0)->count(),
        ];

        // $monthlyAmounts = Purchasing::selectRaw('MONTH(renew_date) as month, SUM(amount) as total_amount')
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->pluck('total_amount', 'month');

        $monthlyAmounts = Purchasing::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(amount) as total_amount')
        )
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_amount', 'month');

        return view('admin.dashboard', compact('stats', 'monthlyAmounts'));

        // Mock recent users
        // $recentUsers = User::latest()->take(5)->get();

        // return view('admin.dashboard', compact('stats', 'recentUsers'));
    }

    /**
     * Show the users list.
     */
}
