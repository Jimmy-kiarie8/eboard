<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
        // $this->middleware('CompAdmin');
    }


    public function usersget()
    {
        return User::all();
    }
    public function getcompany()
    {
        return Company::orderBy('created_at', 'DESC')->get();
    }
    public function getview()
    {
        return Company::orderBy('created_at', 'DESC')->get();
    }

    public function getusersNo()
    {
        // $getid = Company::all();
        return User::count();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->color = $request->color;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->tel_no = $request->tel_no;
        $company->user_id = Auth::id();
        $company->save();
        return $company;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->color = $request->color;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->description = $request->description;
        $company->tel_no = $request->tel_no;
        $company->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::find($company->id)->delete();
    }
}
