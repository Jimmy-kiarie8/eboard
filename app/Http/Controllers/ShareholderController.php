<?php

namespace App\Http\Controllers;

use App\Shareholder;
use Illuminate\Http\Request;
use Auth;

class ShareholderController extends Controller
{
    public function getcom()
    {
        return Shareholder::all();
    }
    
    public function getShareholders()
    {
        return Shareholder::all();
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
        $shareholder = new Shareholder;
        $shareholder->post = $request->post;
        $shareholder->user_id = Auth::id();
        $shareholder->save();
        return $shareholder;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function show(Shareholder $shareholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Shareholder $shareholder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shareholder $shareholder)
    {
        $shareholder = Shareholder::find($request->id);
        $shareholder->name = $request->name;
        $shareholder->email = $request->email;
        $shareholder->shareholder_no = $request->shareholder_no;
        $shareholder->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shareholder  $shareholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shareholder $shareholder)
    {
        return Shareholder::where('id', $shareholder->id)->delete();
    }
}
