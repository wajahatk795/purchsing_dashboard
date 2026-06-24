@extends('admin.layouts.app')

@section('title', 'companies Management')

@section('content')
    <div class="page-title-box">
        <h2 class="page-title">Companies Management</h2>
        @if (auth()->user()->role == 'admin')
            <div style="font-size: 13px; color: white;"><a href="{{ route('admin.company.create') }}"
                    class="btn btn-primary">Create</a></div>
        @endif
    </div>

    <div class="dashboard-card" style="width: 100%;">
        <div class="card-header-flex">
            <span class="card-title">Registered Accounts</span>
            {{-- <div style="font-size: 13px; color: var(--text-secondary);">Total: {{ $companies->total() }} companies</div> --}}
        </div>

        <div class="table-responsive">
            <table class="table-custom" id="companyTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company Name</th>
                        <th>Registered Date</th>
                        @if (auth()->user()->role == 'admin')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                {{-- <tbody>
                    @forelse($companies as $companies)
                        <tr>
                            <td>#{{ $companies->id }}</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div
                                        style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
                                        {{ strtoupper(substr($companies->name, 0, 1)) }}
                                    </div>
                                    <span style="font-weight: 600;">{{ $companies->name }}</span>
                                </div>
                            </td>
                            <td>{{ $companies->email }}</td>
                            <td>{{ $companies->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                                No registered companies found.
                            </td>
                        </tr>
                    @endforelse
                </tbody> --}}

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
                ajax: "{{ route('admin.company.data') }}",

                columns: [{
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
                        data: 'created_at',
                        name: 'created_at'
                    }

                    @if (auth()->user()->role == 'admin')
                        , {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    @endif
                ]
            });

        });
    </script>
@endpush
