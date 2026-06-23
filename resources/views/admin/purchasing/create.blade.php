@extends('admin.layouts.app')

@section('title', 'Create Purchasing')

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
        <h2 class="page-title">Purchasing Management</h2>
        <div style="font-size:13px;color:var(--text-secondary)">
            Create Purchasing
        </div>
    </div>

    <div class="dashboard-card" style="width:100%;">

        <div class="card-header-flex">
            <span class="card-title">Create Purchasing</span>
        </div>

        <form action="{{ route('admin.purchasing.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Company</label>
                    <select name="company_id" class="company-input">
                        <option value="">Select Company</option>

                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">
                                {{ $company->company_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Unit</label>
                    <select name="unit_id" class="company-input">
                        <option value="">Select Unit</option>

                        @foreach ($units as $unit)
                            <option value="{{ $unit->unit_name }}">
                                {{ $unit->unit_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Service Name</label>
                    <input type="text" name="service_name" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Provider</label>
                    <input type="text" name="provider" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Renew Date</label>
                    <input type="date" name="renew_date" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Amount</label>
                    <input type="text" name="amount" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Card</label>
                    <input type="text" name="card" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Card Name</label>
                    <input type="text" name="card_name" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>

                    <select name="status" class="company-input">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

            </div>

            <div class="form-actions">

                <button type="reset" class="btn-reset">
                    Reset
                </button>

                <button type="submit" class="btn-create">
                    Create Purchasing
                </button>

            </div>

        </form>

    </div>

@endsection
