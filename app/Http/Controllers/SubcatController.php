<?php

namespace App\Http\Controllers;

use App\Subcat;
use Illuminate\Http\Request;
use Auth;
use App\AttachmentCategory;
use App\Attachment;

class SubcatController extends Controller
{
    public function getattach()
    {
        return Attachment::where('sub_cat', 0)->get();
    }
    public function subcat()
    {
        return Subcat::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = AttachmentCategory::all();
        $docs = Attachment::paginate(10);
        $subcats = Subcat::paginate(10);
        /*foreach ($subcats as $subcat) {
            $subcat_id = $subcat->users_id;
        }
        dd($subcats);*/
        return view('docs.docs', ['category' => $category, 'docs' => $docs, 'subcats' => $subcats]);
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
        $subcat = new Subcat;
        $subcat->title = $request->title;
        $subcat->description = $request->description;
        $subcat->cat_id = $request->cat_id;
        $subcat->users_id = $request->users_id;
        $subcat->user_id = Auth::id();
        $subcat->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function show(Subcat $subcat)
    {
        $sub = Attachment::find($subcat->id);
        return view('docs.show')->with('sub', $sub);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub = Attachment::find($id);
        $subcats = Subcat::all();
        // $subcats = Subcat::pluck('title', 'id');
        // dd($sub);
        return view('docs.edit', ['sub' => $sub, 'subcats' => $subcats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcat $subcat, $id)
    {
        // return $request->all();
        $sub = Attachment::find($request->id);
        $sub->sub_cat = $request->sub_cat;
        $sub->save();
        return $sub;
        // dd($request->input('sub_cat'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcat  $subcat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcat $subcat)
    {
        //
    }
}
