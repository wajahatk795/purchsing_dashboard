@extends('admin.layouts.app')

@section('title', 'Edit Unit')

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
            padding: 0 15px 0 45px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            background: var(--bg-secondary);
            color: var(--text-primary);
            transition: all .25s ease;
        }

        .company-input::placeholder {
            color: var(--text-secondary);
        }

        .company-input:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
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
            cursor: pointer;
            transition: .2s;
        }

        .btn-reset:hover {
            opacity: .9;
        }

        .btn-create {
            padding: 10px 18px;
            border-radius: 8px;
            border: none;
            background: var(--accent-color);
            color: #fff;
            cursor: pointer;
            transition: .2s;
        }

        .btn-create:hover {
            transform: translateY(-1px);
        }

        .validation-error {
            display: block;
            margin-top: 6px;
            color: #ef4444;
            font-size: 13px;
        }
    </style>

    <div class="page-title-box">
        <h2 class="page-title">Unit Management</h2>
        <div style="font-size: 13px; color: var(--text-secondary);">
            Edit Unit
        </div>
    </div>

    <div class="dashboard-card" style="width: 80%;">
        <div class="card-header-flex">
            <span class="card-title">Edit Unit</span>
        </div>

        <form action="{{ route('admin.unit.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">
                    <i class="bx bxs-building"></i>
                    Select Company
                    <span class="required">*</span>
                </label>

                <div class="company-input-wrapper">

                    <select name="company_id" class="company-input" required>
                        <option value="">Choose Company</option>

                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $unit->company_id == $company->id ? 'selected' : '' }}>
                                {{ $company->company_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                @error('company_id')
                    <small class="validation-error">
                        {{ $message }}
                    </small>
                @enderror
            </div>


            <div class="form-group">
                <label class="form-label">
                    <i class="bx bx-purchase-tag"></i>
                    Unit Name
                    <span class="required">*</span>
                </label>

                <div class="company-input-wrapper">
                    <input type="text" name="unit_name" class="company-input" placeholder="Enter Unit Name" required
                        value="{{ $unit->unit_name }}">
                </div>

                @error('unit_name')
                    <small class="validation-error">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.unit') }}" class="btn-reset">
                    <i class="bx bx-arrow-back"></i>
                    Back
                </a>

                <button type="submit" class="btn-create">
                    <i class="bx bx-save"></i>
                    Update Unit
                </button>
            </div>

        </form>
    </div>

@endsection
