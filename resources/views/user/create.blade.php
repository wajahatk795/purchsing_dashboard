@extends('admin.layouts.app')

@section('title', 'User Management')

@section('content')

<style>
    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-primary);
        font-weight: 600;
        font-size: 14px;
    }

    .required {
        color: #ef4444;
    }

    .company-input-wrapper {
        position: relative;
    }

    .company-input-wrapper i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-secondary);
        font-size: 18px;
    }

    .company-input {
        width: 100%;
        height: 48px;
        padding: 0 15px;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        background: var(--bg-secondary);
        color: var(--text-primary);
        transition: all .25s ease;
    }

    .company-input:focus {
        outline: none;
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(99,102,241,.12);
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 28px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .btn-reset {
        padding: 10px 18px;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        background: var(--bg-secondary);
        color: var(--text-primary);
        text-decoration: none;
    }

    .btn-create {
        padding: 10px 18px;
        border-radius: 8px;
        border: none;
        background: var(--accent-color);
        color: #fff;
        cursor: pointer;
    }

    .validation-error {
        display: block;
        margin-top: 6px;
        color: #ef4444;
        font-size: 13px;
    }
</style>

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