@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')


<div class="page-title-box">
    <h2 class="page-title">User Management</h2>
</div>

<div class="dashboard-card" style="width:100%;">

    <div class="card-header-flex">
        <span class="card-title">Register New User</span>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">
                        <i class="bx bx-user"></i>
                        Full Name
                        <span class="required">*</span>
                    </label>

                    <input type="text"
                           name="name"
                           class="company-input"
                           placeholder="Enter Full Name"
                           value="{{ old('name') }}"
                           required>

                    @error('name')
                        <small class="validation-error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">
                        <i class="bx bx-envelope"></i>
                        Email Address
                        <span class="required">*</span>
                    </label>

                    <input type="email"
                           name="email"
                           class="company-input"
                           placeholder="Enter Email Address"
                           value="{{ old('email') }}"
                           required>

                    @error('email')
                        <small class="validation-error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">
                        <i class="bx bx-lock"></i>
                        Password
                        <span class="required">*</span>
                    </label>

                    <input type="password"
                           name="password"
                           class="company-input"
                           placeholder="Enter Password"
                           required>

                    @error('password')
                        <small class="validation-error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">
                        <i class="bx bx-lock-alt"></i>
                        Confirm Password
                        <span class="required">*</span>
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="company-input"
                           placeholder="Confirm Password"
                           required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">
                        <i class="bx bx-shield-quarter"></i>
                        Role
                        <span class="required">*</span>
                    </label>

                    <select name="role" class="company-input" required>
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="viewer">Viewer</option>
                    </select>

                    @error('role')
                        <small class="validation-error">{{ $message }}</small>
                    @enderror
                </div>
            </div>

        </div>

        <div class="form-actions">

            <a href="{{ route('admin.dashboard') }}" class="btn-reset">
                <i class="bx bx-arrow-back"></i>
                Back
            </a>

            <button type="submit" class="btn-create">
                <i class="bx bx-user-plus"></i>
                Create User
            </button>

        </div>

    </form>

</div>

@endsection