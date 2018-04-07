<?php

namespace App\Http\Controllers;

use App\Director;
use Illuminate\Http\Request;
use Auth;

class DirectorController extends Controller
{
    public function getdircom()
    {
        return Director::all();
    }
    
    public function getdirect()
    {
        return Director::all();
    }
    public function getDirector()
    {
        return Director::all();
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
        $director = new Director;
        $director->name = $request->name;
        $director->email = $request->email;
        $director->director_no = $request->director_no;
        $director->user_id = Auth::id();
        $director->save();
        return $director;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        $director = Director::find($request->id);
        $director->name = $request->name;
        $director->email = $request->email;        
        $director->director_no = $request->director_no;
        $director->save();
        // return $director;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        return Director::where('id', $director->id)->delete();
    }
}
