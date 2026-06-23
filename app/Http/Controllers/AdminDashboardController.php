<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function index()
    {
        // Sample statistics data for the dashboard widgets
        $stats = [
            'total_orders' => 8052,
            'total_revenue' => '$6.2K',
            'new_users' => User::count(),
            'sold_items' => 956,
            'total_visits' => '12M',
            'total_returns' => 178
        ];

        // Mock recent users
        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers'));
    }

    /**
     * Show the users list.
     */
    public function users()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);
        return view('admin.users', compact('users'));
    }
}
