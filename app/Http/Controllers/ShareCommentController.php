<?php

namespace App\Http\Controllers;

use App\ShareComment;
use Illuminate\Http\Request;
use Auth;

class ShareCommentController extends Controller
{
    public function getsharecomment()
    {
        return ShareComment::all();
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
        $comment = new ShareComment;
        $comment->comment = $request->comment;
        $comment->post_id = 1;
        $comment->user_id = Auth::id();
        $comment->save();
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShareComment  $shareComment
     * @return \Illuminate\Http\Response
     */
    public function show(ShareComment $shareComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShareComment  $shareComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ShareComment $shareComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShareComment  $shareComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShareComment $shareComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShareComment  $shareComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShareComment $shareComment)
    {
        //
    }
}
