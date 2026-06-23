<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Rocker</title>
    <!-- Boxicons CDN -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Main Admin CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        // Inline script to prevent theme flash on page load
        const theme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-theme', theme);
    </script>
</head>

<body>
    <div class="app-container">
        <!-- Sidebar Layout Component -->
        @include('admin.layouts.sidebar')

        <!-- Main Workspace Wrapper -->
        <div class="main-wrapper">
            <!-- Header Layout Component -->
            @include('admin.layouts.header')

            <!-- Page Main Content Body -->
            <main class="content-body">
                @if (session('success'))
                    <div class="alert-custom alert-success">
                        <i class="bx bx-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert-custom alert-danger">
                        <i class="bx bx-error-circle"></i> {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer Layout Component -->
            @include('admin.layouts.footer')
        </div>
    </div>

    <!-- Main Admin JS -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

    @stack('scripts')
</body>

</html>
