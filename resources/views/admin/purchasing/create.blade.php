@extends('admin.layouts.app')

@section('title', 'Create Purchasing')

@section('content')

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

                    <input type="number" name="amount" class="company-input" 
                        min="0" step="0.01" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Card</label>

                    <input type="number" name="card" class="company-input" 
                        min="0" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Card Name</label>
                    <input type="text" name="card_name" class="company-input">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>

                    <select name="status" class="company-input">
                        <option value="1">Done</option>
                        <option value="0">Pending</option>
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
