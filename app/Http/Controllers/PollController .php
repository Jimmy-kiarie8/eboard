<?php

namespace App\Http\Controllers;

use App\Poll;
use App\PollOption;
use Illuminate\Http\Request;
use Auth;

class PollController extends Controller
{
    public function getpoll()
    {
        return Poll::all();
    }
    public function index()
    {
        // return view('index');
    }

    public function  show()
    {
        /*$cookie = request()->cookie('poll');

        $poll = Poll::with('pollOptions')->active()->first();
        return [
            'poll'=>$poll->question,
            'options' => $poll->pollOptions->map(function($item){
                return ['id' => $item->id, 'name' => $item->name, 'total' => $item->total ];
            }),
            'isCookie' => $cookie ? true : false
            ];*/
    }

    public function store(Request $request)
    {
        /*$id = $request->get('id');
        $user_id = Auth::id();
        if($id)
        {
            $option = PollOption::findOrFail($id);
            $option->total += 1;
            $option->save();

            return response("Vote added successfully")->cookie('poll','yes',1440);
        }*/
        // return $request->all();
        $poll = new Poll;
        $poll->title = $request->title;
        $poll->question = $request->question;
        $poll->user_id = Auth::id();
        $poll->save();
        return $poll;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        $poll = Poll::find($request->id);
        $poll->title = $request->title;
        $poll->question = $request->question;
        $poll->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        //
    }
}