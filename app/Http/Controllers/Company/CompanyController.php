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
        $fileName = $this->upload($request);

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $fileName,
            'website' => $request->website
        ]);

        return redirect('/admin/companies')->with('success', 'Company created successfully!');
    }

    public function upload($request)
    {
        if ($request->hasFile('logo')) {
            $fileExt = $request->file('logo')->getClientOriginalExtension();
            $fileName = $request->name . '_logo_' . '_' . date("Y-m-d") . '.' . $fileExt;
            $request->logo->storeAs('public', $fileName);
            // $request->file('logo')->move(public_path('storage'), $fileName);
            return $fileName;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('pages.company.show', ['company' => $company]);
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
            'email' => ['email'],
            'logo' => ['nullable', 'dimensions:min_width=100, min_height=100'],
            'website' => ['nullable']
        ]);
        $fileName = $this->upload($request);

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $fileName,
            'website' => $request->website
        ]);
        return redirect('/admin/companies')->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect('/admin/companies')->with('success', 'Company is successfully deleted');
    }
}
