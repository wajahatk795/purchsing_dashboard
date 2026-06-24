<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }


    public function getCompanies(Request $request)
    {
        if ($request->ajax()) {

            $companies = Company::select([
                'id',
                'company_name',
                'created_at'
            ]);

            $datatable = DataTables::of($companies)

                ->editColumn('company_name', function ($row) {

                    $letter = strtoupper(substr($row->company_name, 0, 1));

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

                        <span>' . $row->company_name . '</span>
                    </div>';
                })

                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('M d, Y h:i A');
                });

            // Admin only actions
            if (Auth::user()->role == 'admin') {

                $datatable->addColumn('action', function ($row) {

                    return '
                    <a href="' . route('admin.company.edit', $row->id) . '"
                        class="btn btn-sm btn-primary">
                        <i class="bx bx-edit"></i>
                    </a>

                    <form action="' . route('admin.company.destroy', $row->id) . '"
                        method="POST"
                        style="display:inline-block;"
                        onsubmit="return confirm(\'Are you sure you want to delete this company?\')">

                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '

                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bx bx-trash"></i>
                        </button>
                    </form>
                ';
                });

                $datatable->rawColumns(['company_name', 'action']);
            } else {
                $datatable->rawColumns(['company_name']);
            }

            return $datatable->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255|unique:companies,company_name',
        ]);

        Company::create([
            'company_name' => $request->company_name,
        ]);

        return redirect()->route('admin.company')->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'company_name' => 'required|string|max:255|unique:companies,company_name,' . $company->id,
        ]);

        $company->update([
            'company_name' => $request->company_name,
        ]);

        return redirect()
            ->route('admin.company')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()
            ->route('admin.company')
            ->with('success', 'Company deleted successfully.');
    }
}
