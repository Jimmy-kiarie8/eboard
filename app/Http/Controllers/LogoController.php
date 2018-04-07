<?php

namespace App\Http\Controllers;

use App\Logo;
use App\Company;
use Auth;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function getlogo()
    {
        $logos = Logo::where('user_id', Auth::id())->get();
        foreach ($logos as $logo) {
            $image = $logo->image;
        };
        return $image;
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
        $upload = new Logo;
        if ($request->hasFile('image')) {
            $imagename = time().$request->image->getClientOriginalName();
            $request->image->storeAs('public/logo', $imagename);
            // return response();
        }
        $image_name = '/storage/logo/'.$imagename;
        $upload->image = $image_name;
        $upload->company_id = '1';
        $upload->user_id = Auth::id();
        $upload->save();
        return $request->all();
        /*$logo = new Logo;
        $logo->applicant_name = $request->applicant_name;
        $logo->application_no = $request->application_no;
        $logo->proposal_no = $request->proposal_no;
        $logo->originator = $request->originator;
        $logo->description = $request->description;
        $logo->currency_name = $request->currency_name;
        $logo->amount = $request->amount;
        $logo->user_id = Auth::id();
        $logo->save();
        return $logo;*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // return $request->all();
        $upload = Logo::find($request->id);
        if ($request->hasFile('image')) {
            $imagename = time().$request->image->getClientOriginalName();
            $request->image->storeAs('public/logo', $imagename);
            // return response();
        }
        $image_name = '/storage/logo/'.$imagename;
        $upload->image = $image_name;
        $upload->company_id = $request->id;
        $upload->user_id = Auth::id();
        $upload->save();
        // return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        return Logo::where('id', $logo->id)->delete();
    }
}
