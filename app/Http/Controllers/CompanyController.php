<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::orderBy('id', 'desc')->paginate(10);
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated= $request->validate([

            'name'=> 'required|min:4',
            'address'=> 'nullable|min:4',
            'phone'=> 'nullable|numeric',
            'tax'=> 'nullable|numeric'
        ]);
            Company::create($validated);
            return redirect('company ')->with('success','Company Created successfully!');
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
    public function edit( $id)
    {
        $companies=Company::findOrFail($id);
        return view('company.edit', compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated= $request->validate([

        //     'name'=> 'required|min:4',
        //     'address'=> 'nullable|min:4',
        //     'phone'=> 'nullable|numeric',
        //     'tax'=> 'nullable|numeric'
        // ]);
        //     Company::where('id', $id)->update($validated);
        //     return redirect('company')->with('success','Company Updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $companies, $id)
    {
        $companies=Company::destroy($id);

            return redirect('company ')->with('success','Company Deleted successfully!');
    }

}
