@extends('admin.layouts.app')

@section('title', 'Sales Alternate Dashboard')

@section('content')
    <style>
        .chart-container {
            position: relative;
            height: 400px;
            width: 100%;
        }
    </style>
    <div class="page-title-box">
        <h2 class="page-title">Sales Overview</h2>
        <div style="font-size: 13px; color: var(--text-secondary);">Dashboard / Alternate</div>
    </div>

    <!-- Stats Grid cards -->
    <div class="stats-grid">
        <!-- Card 1 -->
        <div class="stat-card">
            <div class="stat-info">
                <span class="stat-title">Total Amount</span>

                <span class="stat-value">
                    {{ number_format($stats['total_amount'], 2) }}
                </span>

                <span class="stat-trend trend-up">
                    <i class="bx bx-wallet"></i>
                    Total Purchasing Amount
                </span>
            </div>

            <div class="stat-icon-wrapper stat-icon-orders">
                <i class="bx bx-money"></i>
            </div>
        </div>
        @if (auth()->user()->role == 'viewer')
            <a href="" style="text-decoration:none;color:inherit;">

                <div class="stat-card">

                    <div class="stat-info">

                        <span class="stat-title">Pending Purchasings</span>

                        <span class="stat-value">
                            {{ $stats['pending_purchasings'] }}
                        </span>

                        <span class="stat-trend trend-down">
                            <i class="bx bx-time"></i>
                            Pending Records
                        </span>

                    </div>

                    <div class="stat-icon-wrapper stat-icon-sold">
                        <i class="bx bx-error-circle"></i>
                    </div>

                </div>

            </a>
        @else
            <a href="{{ route('admin.purchasing') }}?status=0" style="text-decoration:none;color:inherit;">

                <div class="stat-card">

                    <div class="stat-info">

                        <span class="stat-title">Pending Purchasings</span>

                        <span class="stat-value">
                            {{ $stats['pending_purchasings'] }}
                        </span>

                        <span class="stat-trend trend-down">
                            <i class="bx bx-time"></i>
                            Pending Records
                        </span>

                    </div>

                    <div class="stat-icon-wrapper stat-icon-sold">
                        <i class="bx bx-error-circle"></i>
                    </div>

                </div>

            </a>
        @endif

        <!-- Card 2 -->
        {{-- <div class="stat-card">
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
        </div> --}}

        <!-- Card 3 -->
        {{-- <div class="stat-card">
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
        </div> --}}

        <!-- Card 4 -->
        {{-- <div class="stat-card">
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
        </div> --}}
    </div>

    <!-- Charts Row -->
    <div class="dashboard-grid">
        <!-- Line Chart Card -->
        <div class="dashboard-card">
            <div class="card-header-flex">
                <span class="card-title">Total Amount Overview</span>
            </div>

            <div class="chart-container">
                <canvas id="amountChart" height="100"></canvas>
            </div>

        </div>

    </div>

@endsection
