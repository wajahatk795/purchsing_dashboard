@extends('admin.layouts.app')

@section('title', 'Edit Purchasing')

@section('content')

    <div class="page-title-box">
        <h2 class="page-title">Purchasing Management</h2>
        <div style="font-size:13px;color:var(--text-secondary)">
            Edit Purchasing
        </div>
    </div>

    <div class="dashboard-card" style="width:100%;">

        <div class="card-header-flex">
            <span class="card-title">Edit Purchasing</span>
        </div>

        <form action="{{ route('admin.purchasing.update', $purchasing->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="company-input" value="{{ $purchasing->username }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Company</label>

                    <select name="company_id" class="company-input">

                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}"
                                {{ $purchasing->company_id == $company->id ? 'selected' : '' }}>
                                {{ $company->company_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Unit</label>

                    <select name="unit_id" class="company-input">

                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}" {{ $purchasing->unit_id == $unit->id ? 'selected' : '' }}>
                                {{ $unit->unit_name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Service Name</label>

                    <input type="text" name="service_name" class="company-input" value="{{ $purchasing->service_name }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Provider</label>

                    <input type="text" name="provider" class="company-input" value="{{ $purchasing->provider }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Renew Date</label>

                    <input type="date" name="renew_date" class="company-input" value="{{ $purchasing->renew_date }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Amount</label>

                    <input type="number" name="amount" class="company-input" value="{{ $purchasing->amount }}"
                        min="0" step="0.01" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Card</label>

                    <input type="number" name="card" class="company-input" value="{{ $purchasing->card }}"
                        min="0" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Card Name</label>

                    <input type="text" name="card_name" class="company-input" value="{{ $purchasing->card_name }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>

                    <select name="status" class="company-input">
                        <option value="1" {{ $purchasing->status == 1 ? 'selected' : '' }}>
                            Done
                        </option>

                        <option value="0" {{ $purchasing->status == 0 ? 'selected' : '' }}>
                            Pending
                        </option>
                    </select>
                </div>

            </div>

            <div class="form-actions">

                <a href="{{ route('admin.purchasing') }}" class="btn-reset">
                    Cancel
                </a>

                <button type="submit" class="btn-create">
                    Update Purchasing
                </button>

            </div>

        </form>

    </div>

@endsection
