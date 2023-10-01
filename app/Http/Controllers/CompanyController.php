<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::All();
        return view('company.index')->with('companies', $companies);
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
        $size = $request->file('logo')->getSize();
        $name = $request->file('logo')->getClientOriginalName();

        $request -> file('logo')->storeAs('public/images/', $name);
        $companies = new Company();
        $companies->company_name = $request -> company_name;
        $companies->email = $request -> email;
        $companies->name = $name;
        $companies->size = $size;
        $companies->website = $request -> website;
        $companies->save();
        return redirect('company')->with('flash_message', 'Company Added!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies=Company::find($id);
        return view('company.edit')->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $companies=Company::find($id);
        $input = $request->all();
        $companies->update($input);
        return redirect('company')->with('flash_message', 'Company Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companies=Company::find($id);
        $companies->delete();
        return redirect('company')->with('flash_message', 'Company Deleted!');
    }
}
