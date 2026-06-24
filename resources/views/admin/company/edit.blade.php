@extends('admin.layouts.app')

@section('title', 'Edit Company')

@section('content')
    <div class="page-title-box">
        <h2 class="page-title">Company Management</h2>
        <div style="font-size: 13px; color: var(--text-secondary);">
            Update Company
        </div>
    </div>

    <div class="dashboard-card" style="width: 80%;">
        <div class="card-header-flex">
            <span class="card-title">Edit Company</span>
        </div>

        <form action="{{ route('admin.company.update', $company->id) }}" method="POST" class="company-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">
                    Company Name
                    <span class="required">*</span>
                </label>

                <div class="company-input-wrapper">
                    {{-- <i class="bx bxs-building"></i> --}}

                    <input type="text" name="company_name" class="company-input" placeholder="Enter company name..."
                        value="{{ old('company_name', $company->company_name) }}">
                </div>

                @error('company_name')
                    <small class="validation-error">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-actions">

                <a href="{{ route('admin.company') }}" class="btn-reset" style="text-decoration:none;">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>

                <button type="submit" class="btn-create">
                    <i class="bx bx-save"></i>
                    Update Company
                </button>

            </div>
        </form>
    </div>

@endsection
