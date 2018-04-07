<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Profile;
use App\Post;
use App\User;

class ProfilesController extends Controller
{
    public function index()
    {
        // $dposts = Post::all()->where('user_id', $user_id);
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $posts = Post::orderby('created_at', 'desc')->where('user_id', $user_id)->paginate(8);
            return view('profiles.index')->with('posts', $posts);
        }
        return redirect()->route('login')->with('error', 'Please Login first to see your profile.');
    }

    public function uploadPhoto(Request $request)
    {
        // dd($request->all());
    	$this->validate($request,[
    		'profile' => 'required|image|max:1999'
    	]);
    	$file = $request->file('profile')->getClientOriginalName();
    	$fileName = pathinfo($file, PATHINFO_FILENAME);
    	$ext = $request->file('profile')->getClientOriginalExtension();
    	$fileToStore = $fileName.'_'.time().'.'.$ext;
    	$path = $request->file('profile')->storeas('public/profile', $fileToStore);
        $file_path = '/storage/profile/'.$fileToStore;
    	$user_id = Auth::user()->id;
    	DB::table('users')->where('id', $user_id)->update(['profile' => $file_path]);
    	return back()->with('success', 'profile picture successfully Updated');

    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search');
        }
        $user = User::where('name', 'LIKE', '%$query%')
                        ->orwhere('email', 'LIKE', '%$query%')
                        ->get();
        dd($user);
        // return view('search.results');
    }
}
