<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('pages.company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['email', 'unique:companies'],
            'logo' => ['nullable', 'dimensions:min_width=100, min_height=100'],
            'website' => ['nullable']
        ]);

        Company::create($request->all());

        if ($request->hasFile('logo')) {
            $fileExt = $request->file('logo')->getClientOriginalExtension();
            $fileName = $request->name . '_logo_' . '_' . date("Y-m-d") . '.' . $fileExt;
            $request->logo->storeAs('storage', $fileName);
            // $request->file('logo')->move(public_path('storage'), $fileName);
            return $fileName;
        }

        return redirect('/admin/companies')->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('pages.company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['email', 'unique:companies'],
            'logo' => ['nullable', 'dimensions:min_width=100, min_height=100'],
            'website' => ['nullable']
        ]);

        $company->update($request->all());
        return redirect('/admin/companies')->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $_company = Company::findOrFail($company);
        $_company->delete();

        return redirect('/admin/companies')->with('success', 'Company is successfully deleted');
    }
}
