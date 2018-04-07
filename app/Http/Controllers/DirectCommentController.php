<?php

namespace App\Http\Controllers;

use App\DirectComment;
use Auth;
use Illuminate\Http\Request;

class DirectCommentController extends Controller
{
    public function getdirectcomment()
    {
        return DirectComment::all();
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
        $comment = new DirectComment;
        $comment->comment = $request->comment;
        $comment->post_id = 1;
        $comment->user_id = Auth::id();
        $comment->save();
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DirectComment  $directComment
     * @return \Illuminate\Http\Response
     */
    public function show(DirectComment $directComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DirectComment  $directComment
     * @return \Illuminate\Http\Response
     */
    public function edit(DirectComment $directComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DirectComment  $directComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DirectComment $directComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DirectComment  $directComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DirectComment $directComment)
    {
        //
    }
}
