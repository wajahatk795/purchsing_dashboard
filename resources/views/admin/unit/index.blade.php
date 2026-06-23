@extends('admin.layouts.app')

@section('title', 'companies Management')

@section('content')
    <div class="page-title-box">
        <h2 class="page-title">companies Management</h2>
        <div style="font-size: 13px; color: var(--text-secondary);"><a href="{{ route('admin.unit.create') }}"
                class="btn btn-primary">Create</a></div>
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
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>


    </div>
@endsection
@push('scripts')
    <script>
        $(function() {

            $('#companyTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.unit.data') }}",

                columns: [{
                        data: 'id',
                        name: 'id',
                        render: function(data) {
                            return '#' + data;
                        }
                    },
                    {
                        data: 'company_id',
                        name: 'company_id'
                    },
                    {
                        data: 'unit_name',
                        name: 'unit_name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });
    </script>
@endpush
