<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Company;
use App\Models\Purchasing;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class PurchasingController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $units = Unit::all();
        return view('admin.purchasing.index', compact('companies', 'units'));
    }

    public function getPurchasings(Request $request)
    {
        if ($request->ajax()) {

            $purchasings = Purchasing::with(['company', 'unit']);

            // Editor can only see Xtend Systems
            if (Auth::user()->role == 'editor') {

                $purchasings->whereHas('company', function ($q) {
                    $q->where('company_name', 'Xtend Systems');
                });
            }

            if ($request->filled('id')) {
                $purchasings->where('id', $request->id);
            }

            if ($request->filled('company_id')) {
                $purchasings->where('company_id', $request->company_id);
            }

            if ($request->filled('service_name')) {
                $purchasings->where(
                    'service_name',
                    'like',
                    '%' . $request->service_name . '%'
                );
            }

            if ($request->filled('provider')) {
                $purchasings->where(
                    'provider',
                    'like',
                    '%' . $request->provider . '%'
                );
            }

            if ($request->filled('renew_date')) {
                $purchasings->whereDate(
                    'renew_date',
                    $request->renew_date
                );
            }

            if ($request->filled('amount')) {
                $purchasings->where(
                    'amount',
                    'like',
                    '%' . $request->amount . '%'
                );
            }

            if ($request->filled('card')) {
                $purchasings->where(
                    'card',
                    'like',
                    '%' . $request->card . '%'
                );
            }

            if ($request->filled('card_name')) {
                $purchasings->where(
                    'card_name',
                    'like',
                    '%' . $request->card_name . '%'
                );
            }

            if (
                $request->has('status')
                && $request->status !== null
                && $request->status !== ''
            ) {
                $purchasings->where('status', $request->status);
            }

            $datatable = DataTables::of($purchasings)

                ->addColumn('company_name', function ($row) {
                    return $row->company?->company_name ?? 'N/A';
                })

                ->addColumn('unit_name', function ($row) {

                    if (!$row->unit) {
                        return 'N/A';
                    }

                    $letter = strtoupper(substr($row->unit->unit_name, 0, 1));

                    return '
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="
                            width:28px;
                            height:28px;
                            border-radius:50%;
                            background:var(--accent-color);
                            color:white;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-weight:700;">
                            ' . $letter . '
                        </div>

                        <span>' . $row->unit->unit_name . '</span>
                    </div>
                ';
                })

                ->editColumn('status', function ($row) {

                    if ($row->status == 1) {
                        return '<span class="badge bg-success">Done</span>';
                    }

                    return '<span class="badge bg-danger">Pending</span>';
                })

                ->editColumn('renew_date', function ($row) {
                    return $row->renew_date
                        ? date('M d, Y', strtotime($row->renew_date))
                        : 'N/A';
                });

            // Viewer cannot edit/delete
            if (Auth::user()->role != 'viewer') {

                $datatable->addColumn('action', function ($row) {

                    return '
                    <a href="' . route('admin.purchasing.edit', $row->id) . '"
                        class="btn btn-sm btn-primary">
                        <i class="bx bx-edit"></i>
                    </a>

                    <form action="' . route('admin.purchasing.destroy', $row->id) . '"
                        method="POST"
                        style="display:inline-block;"
                        onsubmit="return confirm(\'Delete this purchasing?\')">

                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '

                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bx bx-trash"></i>
                        </button>
                    </form>
                ';
                });

                $datatable->rawColumns([
                    'unit_name',
                    'status',
                    'action'
                ]);
            } else {

                $datatable->rawColumns([
                    'unit_name',
                    'status'
                ]);
            }

            return $datatable->make(true);
        }
    }

    public function create()
    {
        if (Auth::user()->role == 'editor') {

            $companies = Company::where(
                'company_name',
                'Xtend Systems'
            )->get();
        } else {

            $companies = Company::all();
        }

        $units = Unit::all();

        return view('admin.purchasing.create', compact(
            'companies',
            'units'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'provider' => 'required',
            'renew_date' => 'required',
            'amount' => 'required',
            'card' => 'required',
            'card_name' => 'required',
            'status' => 'required',
            'company_id' => 'required|exists:companies,id',
            'unit_id' => 'required|exists:units,id',
        ]);

        Purchasing::create($request->all());

        return redirect()
            ->route('admin.purchasing')
            ->with('success', 'Purchasing Created Successfully');
    }

    public function edit(Purchasing $purchasing)
    {
        if (Auth::user()->role == 'editor') {

            $companies = Company::where(
                'company_name',
                'Xtend Systems'
            )->get();
        } else {

            $companies = Company::all();
        }

        $units = Unit::all();

        return view(
            'admin.purchasing.edit',
            compact(
                'purchasing',
                'companies',
                'units'
            )
        );
    }

    public function update(Request $request, Purchasing $purchasing)
    {
        $request->validate([
            'service_name' => 'required',
            'provider' => 'required',
            'renew_date' => 'required',
            'amount' => 'required',
            'card' => 'required',
            'card_name' => 'required',
            'status' => 'required',
            'company_id' => 'required|exists:companies,id',
            'unit_id' => 'required|exists:units,id',
        ]);

        $purchasing->update([
            'service_name' => $request->service_name,
            'provider' => $request->provider,
            'renew_date' => $request->renew_date,
            'amount' => $request->amount,
            'card' => $request->card,
            'card_name' => $request->card_name,
            'status' => $request->status,
            'company_id' => $request->company_id,
            'unit_id' => $request->unit_id,
        ]);

        return redirect()
            ->route('admin.purchasing')
            ->with('success', 'Purchasing Updated Successfully');
    }

    public function destroy(Purchasing $purchasing)
    {
        $purchasing->delete();

        return redirect()
            ->route('admin.purchasing')
            ->with('success', 'Purchasing Deleted Successfully');
    }
}
