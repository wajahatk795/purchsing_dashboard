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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const amountChart = document.getElementById('amountChart');

        new Chart(amountChart, {
            type: 'line',
            data: {
                labels: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                ],
                datasets: [{
                    label: 'Total Amount',
                    data: [
                        {{ $monthlyAmounts[1] ?? 0 }},
                        {{ $monthlyAmounts[2] ?? 0 }},
                        {{ $monthlyAmounts[3] ?? 0 }},
                        {{ $monthlyAmounts[4] ?? 0 }},
                        {{ $monthlyAmounts[5] ?? 0 }},
                        {{ $monthlyAmounts[6] ?? 0 }},
                        {{ $monthlyAmounts[7] ?? 0 }},
                        {{ $monthlyAmounts[8] ?? 0 }},
                        {{ $monthlyAmounts[9] ?? 0 }},
                        {{ $monthlyAmounts[10] ?? 0 }},
                        {{ $monthlyAmounts[11] ?? 0 }},
                        {{ $monthlyAmounts[12] ?? 0 }}
                    ],
                    borderColor: '#4f46e5',
                    backgroundColor: 'rgba(79,70,229,0.15)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        labels: {
                            color: '#cbd5e1',
                            font: {
                                size: 13
                            }
                        }
                    }
                },

                scales: {
                    x: {
                        ticks: {
                            color: '#94a3b8'
                        },
                        grid: {
                            color: 'rgba(255,255,255,0.05)'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#94a3b8',
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        },
                        grid: {
                            color: 'rgba(255,255,255,0.05)'
                        }
                    }
                }
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
