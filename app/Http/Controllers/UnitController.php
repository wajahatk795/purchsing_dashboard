<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UnitController extends Controller
{
    public function index()
    {

        return view('admin.unit.index');
    }

    public function getCompanies(Request $request)
    {
        if ($request->ajax()) {

            $units = Unit::with('company')->latest();

            return DataTables::of($units)

                ->addColumn('company_name', function ($row) {

                    if (!$row->company) {
                        return 'N/A';
                    }

                    $letter = strtoupper(substr($row->company->company_name, 0, 1));

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

                        <span>' . $row->company->company_name . '</span>
                    </div>';
                })

                ->addColumn('unit_name', function ($row) {

                    $letter = strtoupper(substr($row->unit_name, 0, 1));

                    return '
                    <div style="display:flex;align-items:center;gap:10px;">
                        <div style="
                            width:28px;
                            height:28px;
                            border-radius:50%;
                            background:#28a745;
                            color:white;
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            font-weight:700;">
                            ' . $letter . '
                        </div>

                        <span>' . $row->unit_name . '</span>
                    </div>';
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('M d, Y h:i A');
                })

                ->addColumn('action', function ($row) {

                    return '
                    <a href="' . route('admin.unit.edit', $row->id) . '"
                        class="btn btn-sm btn-primary">
                        <i class="bx bx-edit"></i>
                    </a>

                    <form action="' . route('admin.unit.destroy', $row->id) . '"
                        method="POST"
                        style="display:inline-block;"
                        onsubmit="return confirm(\'Are you sure you want to delete this unit?\')">

                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '

                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bx bx-trash"></i>
                        </button>

                    </form>
                ';
                })

                ->rawColumns(['company_name', 'unit_name', 'action'])
                ->make(true);
        }
    }

    public function create()
    {
        $companies = Company::all();

        return view('admin.unit.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'unit_name' => 'required|string|max:255',
        ]);

        Unit::create([
            'company_id' => $request->company_id,
            'unit_name' => $request->unit_name,
        ]);

        return redirect()
            ->route('admin.unit')
            ->with('success', 'Unit created successfully.');
    }

    public function edit(Unit $unit)
    {
        $companies = Company::all();

        return view('admin.unit.edit', compact('unit', 'companies'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'unit_name' => 'required|string|max:255',
        ]);

        $unit->update([
            'company_id' => $request->company_id,
            'unit_name' => $request->unit_name,
        ]);

        return redirect()
            ->route('admin.unit')
            ->with('success', 'Unit updated successfully.');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()
            ->route('admin.unit')
            ->with('success', 'Unit deleted successfully.');
    }
}
