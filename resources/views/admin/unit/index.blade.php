@extends('admin.layouts.app')

@section('title', 'companies Management')

@section('content')
    <div class="page-title-box">
        <h2 class="page-title">companies Management</h2>
        @if (auth()->user()->role != 'viewer')
            <div style="font-size: 13px; color: white;"><a href="{{ route('admin.unit.create') }}"
                    class="btn btn-primary">Create</a></div>
        @endif
    </div>

    <div class="dashboard-card" style="width: 100%;">
        <div class="card-header-flex">
            <span class="card-title">Registered Accounts</span>
            {{-- <div style="font-size: 13px; color: var(--text-secondary);">Total: companies</div> --}}
        </div>

        <div class="table-responsive">
            <table class="table-custom" id="companyTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company ID</th>
                        <th>Unit</th>
                        <th>Registered Date</th>
                        @if (auth()->user()->role != 'viewer')
                            <th>Action</th>
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
                    name: 'id',
                    render: function(data) {
                        return '#' + data;
                    }
                },

                {
                    data: 'company_name',
                    name: 'company_name'
                },

                {
                    data: 'unit_name',
                    name: 'unit_name'
                },

                {
                    data: 'created_at',
                    name: 'created_at'
                }

            ];

            @if (auth()->user()->role == 'admin')
                columns.push({
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                });
            @endif

            $('#companyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.unit.data') }}",
                columns: columns
            });

        });
    </script>
@endpush
