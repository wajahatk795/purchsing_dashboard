@extends('admin.layouts.app')

@section('title', 'Sales Alternate Dashboard')

@section('content')
    <div class="page-title-box">
        <h2 class="page-title">Sales Overview</h2>
        <div style="font-size: 13px; color: var(--text-secondary);">Dashboard / Alternate</div>
    </div>

    <!-- Stats Grid cards -->
    <div class="stats-grid">
        <!-- Card 1 -->
        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-title">Total Orders</span>
                <span class="stat-value">{{ $stats['total_orders'] }}</span>
                <span class="stat-trend trend-up">
                    <i class="bx bx-trending-up"></i> +25% <span
                        style="color: var(--text-secondary); font-weight: normal;">since yesterday</span>
                </span>
            </div>
            <div class="stat-icon-wrapper stat-icon-orders">
                <i class="bx bx-shopping-bag"></i>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-title">Total Revenue</span>
                <span class="stat-value">{{ $stats['total_revenue'] }}</span>
                <span class="stat-trend trend-up">
                    <i class="bx bx-trending-up"></i> +15% <span
                        style="color: var(--text-secondary); font-weight: normal;">this week</span>
                </span>
            </div>
            <div class="stat-icon-wrapper stat-icon-revenue">
                <i class="bx bx-dollar"></i>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-title">Registered Users</span>
                <span class="stat-value">{{ $stats['new_users'] }}</span>
                <span class="stat-trend trend-down">
                    <i class="bx bx-trending-down"></i> -10% <span
                        style="color: var(--text-secondary); font-weight: normal;">this month</span>
                </span>
            </div>
            <div class="stat-icon-wrapper stat-icon-users">
                <i class="bx bx-user"></i>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-title">Sold Items</span>
                <span class="stat-value">{{ $stats['sold_items'] }}</span>
                <span class="stat-trend trend-down">
                    <i class="bx bx-trending-down"></i> -14% <span
                        style="color: var(--text-secondary); font-weight: normal;">yesterday</span>
                </span>
            </div>
            <div class="stat-icon-wrapper stat-icon-sold">
                <i class="bx bx-package"></i>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="dashboard-grid">
        <!-- Line Chart Card -->
        <div class="dashboard-card">
            <div class="card-header-flex">
                <span class="card-title">Sales Overview Graph</span>
                <div class="chart-legend">
                    <div class="legend-item">
                        <span class="legend-color color-visits"></span>
                        <span>Visits</span>
                    </div>
                    <div class="legend-item">
                        <span class="legend-color color-sales"></span>
                        <span>Sales</span>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <!-- Custom Scalable Vector Graphics Graph to guarantee visual accuracy without complex external JS dependencies -->
                <div class="chart-svg-wrapper">
                    <svg viewBox="0 0 500 200" preserveAspectRatio="none">
                        <defs>
                            <!-- Gradients -->
                            <linearGradient id="salesGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.4" />
                                <stop offset="100%" stop-color="#3b82f6" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="visitsGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#f59e0b" stop-opacity="0.3" />
                                <stop offset="100%" stop-color="#f59e0b" stop-opacity="0" />
                            </linearGradient>
                        </defs>

                        <!-- Grid Lines -->
                        <line x1="0" y1="40" x2="500" y2="40" stroke="var(--border-color)"
                            stroke-dasharray="4" stroke-width="0.5" />
                        <line x1="0" y1="80" x2="500" y2="80" stroke="var(--border-color)"
                            stroke-dasharray="4" stroke-width="0.5" />
                        <line x1="0" y1="120" x2="500" y2="120" stroke="var(--border-color)"
                            stroke-dasharray="4" stroke-width="0.5" />
                        <line x1="0" y1="160" x2="500" y2="160" stroke="var(--border-color)"
                            stroke-dasharray="4" stroke-width="0.5" />

                        <!-- Area Fills -->
                        <path d="M 0 190 Q 70 30, 150 70 T 300 120 T 450 90 T 500 100 L 500 200 L 0 200 Z"
                            fill="url(#salesGrad)" />
                        <path d="M 0 160 Q 75 120, 150 110 T 300 130 T 450 150 T 500 140 L 500 200 L 0 200 Z"
                            fill="url(#visitsGrad)" />

                        <!-- Line Paths -->
                        <path d="M 0 190 Q 70 30, 150 70 T 300 120 T 450 90 T 500 100" fill="none" stroke="#3b82f6"
                            stroke-width="3" />
                        <path d="M 0 160 Q 75 120, 150 110 T 300 130 T 450 150 T 500 140" fill="none" stroke="#f59e0b"
                            stroke-width="3" />
                    </svg>
                </div>
                <div class="chart-labels-x">
                    <span>Mon</span>
                    <span>Tue</span>
                    <span>Wed</span>
                    <span>Thu</span>
                    <span>Fri</span>
                    <span>Sat</span>
                    <span>Sun</span>
                </div>
            </div>
        </div>

        <!-- Bar Chart Card -->
        <div class="dashboard-card">
            <div class="card-header-flex">
                <span class="card-title">Order Status</span>
                <i class="bx bx-dots-horizontal-rounded" style="cursor: pointer; color: var(--text-secondary);"></i>
            </div>

            <div class="bar-chart-container">
                <div class="bar-wrapper">
                    <div class="bar-pill" style="height: 60%;"></div>
                    <span class="bar-label">Jan</span>
                </div>
                <div class="bar-wrapper">
                    <div class="bar-pill" style="height: 50%;"></div>
                    <span class="bar-label">Feb</span>
                </div>
                <div class="bar-wrapper">
                    <div class="bar-pill" style="height: 90%;"></div>
                    <span class="bar-label">Mar</span>
                </div>
                <div class="bar-wrapper">
                    <div class="bar-pill" style="height: 70%;"></div>
                    <span class="bar-label">Apr</span>
                </div>
                <div class="bar-wrapper">
                    <div class="bar-pill" style="height: 80%;"></div>
                    <span class="bar-label">May</span>
                </div>
                <div class="bar-wrapper">
                    <div class="bar-pill" style="height: 55%;"></div>
                    <span class="bar-label">Jun</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Row Grid (Donut and Widgets) -->
    {{-- <div class="dashboard-grid">
    <!-- Donut Segment Card -->
    <div class="dashboard-card" style="display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative;">
        <span class="card-title" style="align-self: flex-start; margin-bottom: 20px;">Brand Popularity</span>
        
        <!-- Interactive Donut chart -->
        <div style="position: relative; width: 180px; height: 180px; display: flex; align-items: center; justify-content: center; margin: 10px 0;">
            <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
                <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="transparent"></circle>
                <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="var(--border-color)" stroke-width="3"></circle>
                
                <!-- Segments -->
                <!-- Green Segment (40%) -->
                <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="var(--success-color)" stroke-width="4" stroke-dasharray="40 60" stroke-dashoffset="100"></circle>
                <!-- Blue Segment (30%) -->
                <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="var(--accent-color)" stroke-width="4" stroke-dasharray="30 70" stroke-dashoffset="60"></circle>
                <!-- Pink/Red Segment (20%) -->
                <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="var(--danger-color)" stroke-width="4" stroke-dasharray="20 80" stroke-dashoffset="30"></circle>
                <!-- Yellow Segment (10%) -->
                <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="var(--warning-color)" stroke-width="4" stroke-dasharray="10 90" stroke-dashoffset="10"></circle>
            </svg>
            <div style="position: absolute; text-align: center; display: flex; flex-direction: column;">
                <span style="font-size: 20px; font-weight: 700;">Nokia</span>
                <span style="font-size: 14px; color: var(--text-secondary);">30%</span>
            </div>
        </div>
        
        <div style="display: flex; gap: 15px; font-size: 11px; margin-top: 15px;">
            <span style="color: var(--success-color); font-weight: 600;"><i class="bx bxs-circle"></i> Apple</span>
            <span style="color: var(--accent-color); font-weight: 600;"><i class="bx bxs-circle"></i> Nokia</span>
            <span style="color: var(--danger-color); font-weight: 600;"><i class="bx bxs-circle"></i> Samsung</span>
            <span style="color: var(--warning-color); font-weight: 600;"><i class="bx bxs-circle"></i> Sony</span>
        </div>
    </div>

    <!-- Recent Registrations Listing Card -->
    <div class="dashboard-card">
        <div class="card-header-flex">
            <span class="card-title">Recent Registrations</span>
            <a href="{{ route('admin.users') }}" style="font-size: 12px; color: var(--accent-color); font-weight: 600;">View All</a>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 15px;">
            @forelse($recentUsers as $user)
                <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 50%; background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div style="display: flex; flex-direction: column;">
                            <span style="font-size: 13px; font-weight: 600;">{{ $user->name }}</span>
                            <span style="font-size: 11px; color: var(--text-secondary);">{{ $user->email }}</span>
                        </div>
                    </div>
                    <span class="badge badge-{{ $user->role }}">{{ $user->role }}</span>
                </div>
            @empty
                <p style="color: var(--text-secondary); font-size: 13px; text-align: center;">No users registered yet.</p>
            @endforelse
        </div>
    </div>
</div> --}}
@endsection
