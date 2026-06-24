@extends('admin.layouts.app')

@section('title', 'Company Management')

@section('content')
    
    <div class="page-title-box">
        <h2 class="page-title">Company Management</h2>
        <div style="font-size: 13px; color: var(--text-secondary);">
            Create New Company
        </div>
    </div>

    <div class="dashboard-card" style="width: 80%;">
        <div class="card-header-flex">
            <span class="card-title">Create Company</span>
        </div>

        <form action="{{ route('admin.company.store') }}" method="POST" class="company-form">
            @csrf

            <div class="form-group">
                <label class="form-label">
                    Company Name
                    <span class="required">*</span>
                </label>

                <div class="company-input-wrapper">

                    <input type="text" name="company_name" class="company-input" placeholder="Enter company name..."
                        value="{{ old('company_name') }}">
                </div>

                @error('company_name')
                    <small class="validation-error">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-actions">
                <button type="reset" class="btn-reset">
                    <i class="bx bx-refresh"></i>
                    Reset
                </button>

                <button type="submit" class="btn-create">
                    <i class="bx bx-plus-circle"></i>
                    Create Company
                </button>
            </div>
        </form>
    </div>
@endsection
