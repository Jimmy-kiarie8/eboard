@extends('layouts.appb')

@section('content')
<div style="background: #fff;padding: 20px;" class="col-md-8 col-md-offset-2 col-sm-12">
    <h2>Posts</h2>
    {!! Form::open(['action' => ['postsController@update', $post->id], 'method' => 'POST', 'enctype'=>'multipart/form-data', 'data-parsley-validate' => '']) !!}
        <div class='form-group'>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Title', 'required' => ''])}}
        </div>
        <div class='form-group'>
            {{Form::label('body', 'Body')}}
            {{--'id' => 'article-ckeditor',--}}
            {{Form::textarea('body', $post->body, ['class'=>'form-control', 'rows' => '5', 'placeholder'=>'Say something!', 'required' => ''])}}
        </div>
        <div class='form-group'>
            {{Form::file('cover_image')}}<br>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('submit',  ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
</div>
@endsection

