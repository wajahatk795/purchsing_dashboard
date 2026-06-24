@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="page-title-box">
    <h2 class="page-title">User Management</h2>
</div>

<div class="dashboard-card" style="width:100%;">

    <div class="card-header-flex">
        <span class="card-title">Edit User</span>
    </div>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">

                    <label class="form-label">
                        Full Name
                        <span class="required">*</span>
                    </label>

                    <input type="text"
                        name="name"
                        class="company-input"
                        value="{{ old('name', $user->name) }}"
                        required>

                    @error('name')
                        <small class="validation-error">{{ $message }}</small>
                    @enderror

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">

                    <label class="form-label">
                        Email Address
                        <span class="required">*</span>
                    </label>

                    <input type="email"
                        name="email"
                        class="company-input"
                        value="{{ old('email', $user->email) }}"
                        required>

                    @error('email')
                        <small class="validation-error">{{ $message }}</small>
                    @enderror

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">

                    <label class="form-label">
                        New Password
                    </label>

                    <input type="password"
                        name="password"
                        class="company-input"
                        placeholder="Leave blank to keep current password">

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">

                    <label class="form-label">
                        Role
                        <span class="required">*</span>
                    </label>

                    <select name="role" class="company-input" required>

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="editor"
                            {{ $user->role == 'editor' ? 'selected' : '' }}>
                            Editor
                        </option>

                        <option value="viewer"
                            {{ $user->role == 'viewer' ? 'selected' : '' }}>
                            Viewer
                        </option>

                    </select>

                </div>
            </div>

        </div>

        <div class="form-actions">

            <a href="{{ route('admin.users') }}"
                class="btn-reset">
                Back
            </a>

            <button type="submit"
                class="btn-create">
                Update User
            </button>

        </div>

    </form>

</div>

@endsection