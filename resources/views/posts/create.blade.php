@extends('layouts.appb')

@section('content')
<form action="{{route('posts.store')}}" method="post">
    {{ csrf_field() }}
    <!-- <div class="input-group">
       <span class="input-group-btn">
         <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
           <i class="fa fa-picture-o"></i> Choose
         </a>
       </span>
       <label for="title">Title</label>
       <input id="thumbnail" class="form-control" type="text" name="filepath">
    </div> -->
    <img id="holder" style="margin-top:15px;max-height:100px;">
    <div class="form-group">
       <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title"><br>
        <textarea name="content" class="form-control my-editor"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
{{-- <div style="background: #fff;padding: 20px; display: none;" class="col-md-8 col-md-offset-2 col-sm-12">
    <h2>Create Posts</h2>
    {!! Form::open(['action' => 'postsController@store', 'method' => 'POST', 'data-parsley-validate' => '', 'enctype'=>'multipart/form-data']) !!}
        <div class='form-group'>
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title', 'required' => '', 'maxlength' => "100"])}}
        </div>
        <div class='form-group'>
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class'=>'form-control', 'rows' => '5', 'placeholder'=>'Say something!', 'required' => ''])}}
        </div>
        <div class='form-group'>
            {{Form::file('cover_image', ['required' => ''])}}<br>
        </div>        
        {{Form::submit('submit',  ['class'=>'btn btn-primary'])}}
        
    {!! Form::close() !!}
</div> --}}
@endsection
