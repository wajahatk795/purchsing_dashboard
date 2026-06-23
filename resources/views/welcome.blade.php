<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Rocker App</title>
    <!-- Boxicons CDN -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Admin CSS stylesheet link -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="welcome-container">
    <div>
        <div class="welcome-logo">
            <i class="bx bxs-bolt brand-icon"></i> Rocker
        </div>
        <p class="welcome-tagline">
            Experience the next-generation admin panel with collapsible sidebar navigation, live user statistics, and persistent dark/light mode functionality.
        </p>

        @if(session('success'))
            <div class="alert-custom alert-success" style="max-width: 500px; margin: 0 auto 20px auto;">
                {{ session('success') }}
            </div>
        @endif

        <div class="welcome-actions">
            @auth
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-primary-welcome">
                        <i class="bx bxs-dashboard"></i> Go to Admin Panel
                    </a>
                @else
                    <div style="display: flex; flex-direction: column; gap: 15px; align-items: center;">
                        <p style="color: #94a3b8;">You are logged in as a standard user.</p>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-secondary-welcome" style="cursor: pointer;">
                                <i class="bx bx-log-out"></i> Log Out
                            </button>
                        </form>
                    </div>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn-primary-welcome">
                    <i class="bx bx-log-in"></i> Login
                </a>
                <a href="{{ route('register') }}" class="btn-secondary-welcome">
                    <i class="bx bx-user-plus"></i> Register
                </a>
            @endauth
        </div>
    </div>
</body>
</html>
