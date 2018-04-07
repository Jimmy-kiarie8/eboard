<?php

namespace App\Http\Controllers;

use App\User;
use App\Attachment;
use App\AttachmentCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	public function getDocs() {
		return Attachment::all();
	}

	public function getAllUsers() {
		return User::all();
	}

	public function getCat() {
		return AttachmentCategory::all();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$category = AttachmentCategory::find($request->id);
		$category->name = $request->title;
		$category->description = $request->description;
		$category->save();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, AttachmentCategory $attachmentCategory) {
        // return $request->all();
		AttachmentCategory::where('id', $attachmentCategory->id)->delete();
	}
}
