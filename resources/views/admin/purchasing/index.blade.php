@extends('admin.layouts.app')

@section('title', 'Purchasing Management')

@section('content')
    <style>
        .filter-row th {
            padding: 8px 4px !important;
            background-color: var(--bg-secondary) !important;
            border-bottom: 2px solid var(--border-color) !important;
        }

        .filter-row input,
        .filter-row select {
            font-size: 12px !important;
            height: 32px !important;
            padding: 2px 8px !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 6px !important;
            background: var(--bg-primary) !important;
            color: var(--text-primary) !important;
            width: 100%;
        }

        .filter-row input:focus,
        .filter-row select:focus {
            outline: none !important;
            border-color: var(--accent-color) !important;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, .12) !important;
        }

        /* Make table cells scrollable and prevent text wrapping */
        .table-custom th,
        .table-custom td {
            white-space: nowrap !important;
            vertical-align: middle !important;
        }

        .table-responsive {
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
        }
    </style>

    <div class="page-title-box">
        <h2 class="page-title">Purchasing Management</h2>

        <div>
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'editor')
                <a href="{{ route('admin.purchasing.create') }}" style="color: white !important" class="btn btn-primary">
                    Create
                </a>
            @endif
        </div>
    </div>

    <div class="dashboard-card">

        <div class="card-header-flex">
            <span class="card-title">Purchasing List</span>
        </div>

        <div class="table-responsive">

            <table class="table-custom" id="purchasingTable" style="width:100%;">

                <thead>
                    <tr>
                        <th style="min-width: 70px;">ID</th>
                        <th style="min-width:140px;">Username</th>
                        <th style="min-width: 150px;">Company</th>
                        <th style="min-width: 110px;">Unit</th>
                        <th style="min-width: 160px;">Service Name</th>
                        <th style="min-width: 130px;">Provider</th>
                        <th style="min-width: 140px;">Renew Date</th>
                        <th style="min-width: 110px;">Amount</th>
                        <th style="min-width: 130px;">Card</th>
                        <th style="min-width: 140px;">Card Name</th>
                        <th style="min-width: 120px;">Status</th>
                        @if (auth()->user()->role != 'viewer')
                            <th style="min-width: 90px;">Action</th>
                        @endif
                    </tr>
                    <tr class="filter-row">
                        <th>
                            <input type="text" id="filter-id" placeholder="ID">
                        </th>
                        <th>
                            <input type="text" id="filter-username" placeholder="Username">
                        </th>
                        <th>
                            <select id="filter-company">
                                <option value="">All</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <select id="filter-unit">
                                <option value="">All</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">Unit #{{ $unit->id }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th>
                            <input type="text" id="filter-service-name" placeholder="Service">
                        </th>
                        <th>
                            <input type="text" id="filter-provider" placeholder="Provider">
                        </th>
                        <th>
                            <input type="date" id="filter-renew-date">
                        </th>
                        <th>
                            <input type="text" id="filter-amount" placeholder="Amount">
                        </th>
                        <th>
                            <input type="text" id="filter-card" placeholder="Card">
                        </th>
                        <th>
                            <input type="text" id="filter-card-name" placeholder="Card Name">
                        </th>
                        <th>
                            <select id="filter-status">
                                <option value="">All</option>
                                <option value="1">Done</option>
                                <option value="0">Pending</option>
                            </select>
                        </th>
                        @if (auth()->user()->role != 'viewer')
                            <th></th>
                        @endif
                    </tr>
                </thead>

            </table>

        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(function() {

            let columns = [

                {
                    data: 'id',
                    render: function(data) {
                        return '#' + data;
                    }
                },

                {
                    data: 'username',
                    name: 'username'
                },

                {
                    data: 'company_name',
                    name: 'company.company_name'
                },

                {
                    data: 'unit_name',
                    name: 'unit_name'
                },

                {
                    data: 'service_name',
                    name: 'service_name'
                },

                {
                    data: 'provider',
                    name: 'provider'
                },

                {
                    data: 'renew_date',
                    name: 'renew_date'
                },

                {
                    data: 'amount',
                    name: 'amount'
                },

                {
                    data: 'card',
                    name: 'card'
                },

                {
                    data: 'card_name',
                    name: 'card_name'
                },

                {
                    data: 'status',
                    name: 'status'
                }

            ];

            @if (auth()->user()->role != 'viewer')
                columns.push({
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                });
            @endif

            let table = $('#purchasingTable').DataTable({

                processing: true,
                serverSide: true,

                ajax: {
                    url: "{{ route('admin.purchasing.data') }}",

                    data: function(d) {

                        d.id = $('#filter-id').val();
                        d.username = $('#filter-username').val();
                        d.company_id = $('#filter-company').val();
                        d.unit_id = $('#filter-unit').val();
                        d.service_name = $('#filter-service-name').val();
                        d.provider = $('#filter-provider').val();
                        d.renew_date = $('#filter-renew-date').val();
                        d.amount = $('#filter-amount').val();
                        d.card = $('#filter-card').val();
                        d.card_name = $('#filter-card-name').val();
                        d.status = $('#filter-status').val();
                    }
                },

                order: [
                    [0, 'desc']
                ],
                columns: columns
            });

            $('.filter-row input, .filter-row select').on(
                'keyup change',
                function() {
                    table.draw();
                }
            );

        });
    </script>
@endpush
