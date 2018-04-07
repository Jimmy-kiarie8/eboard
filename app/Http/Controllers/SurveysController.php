<?php

namespace App\Http\Controllers;

use App\Surveys;
use Illuminate\Http\Request;
use Auth;

class SurveysController extends Controller
{
    public function getsurvey()
    {
        return Surveys::all();
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
        $survey = new Surveys;
        $survey->title = $request->title;
        $survey->description = $request->description;
        $survey->user_id = Auth::id();
        $survey->save();
        return $survey;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function show(Surveys $surveys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function edit(Surveys $surveys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surveys $surveys)
    {
        $survey = Surveys::find($request->id);
        $survey->title = $request->title;
        $survey->description = $request->description;
        $survey->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surveys  $surveys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surveys $surveys)
    {
        return Surveys::where('id', $surveys->id)->delete();
    }
}
