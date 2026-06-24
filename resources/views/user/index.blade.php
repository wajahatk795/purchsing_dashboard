@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')
    <div class="page-title-box">
        <h2 class="page-title">User Management</h2>
        @if (auth()->user()->role != 'viewer')
            <div style="font-size: 13px; color: white;"><a href="{{ route('admin.users.create') }}"
                    class="btn btn-primary">Create</a></div>
        @endif
    </div>

    <div class="dashboard-card" style="width: 100%;">
        <div class="card-header-flex">
            <span class="card-title">Registered Accounts</span>
            <div style="font-size: 13px; color: var(--text-secondary);">Total: {{ $users->total() }} users</div>
        </div>

        <div class="table-responsive">
            <table class="table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>System Role</th>
                        <th>Registered Date</th>
                        @if (auth()->user()->role != 'viewer')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div
                                        style="width: 28px; height: 28px; border-radius: 50%; background-color: var(--accent-color); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span style="font-weight: 600;">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge" style="background-color: blue; ">{{ $user->role }}</span>
                            </td>
                            <td>{{ $user->created_at->format('M d, Y h:i A') }}</td>
                            @if (auth()->user()->role != 'viewer')
                                <td>

                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                        <i class="bx bx-edit"></i>
                                    </a>

                                    @if ($user->id != auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Are you sure you want to delete this user?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bx bx-trash"></i>
                                            </button>

                                        </form>
                                    @endif

                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                                No registered users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($users->hasPages())
            <div class="pagination-container">
                <ul class="pagination-custom">
                    {{-- Previous Page Link --}}
                    @if ($users->onFirstPage())
                        <li class="disabled"><span>&laquo;</span></li>
                    @else
                        <li><a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($users->hasMorePages())
                        <li><a href="{{ $users->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="disabled"><span>&raquo;</span></li>
                    @endif
                </ul>
            </div>
        @endif
    </div>
@endsection
