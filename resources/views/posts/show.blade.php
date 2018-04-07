@extends('layouts.appb')

@section('content')
{{-- 
<div class="panel panel-info col-md-6 col-md-offset-3">
    <div class="panel-heading text-center">Blog page</div>

    <div class="panel-body">
        <a class="btn btn-sm btn-info" href="/posts" style="text-decoration:none;">Go back</a><hr>   
    <div class='rows'>
        <div class='col-md-8 col-sm-8'>
            <h3>{{$post->title}}</h3>
            <p>{!! $post->body !!}</p>
            <small>Written {{$post->created_at->diffForhumans()}} by~{{$post->user->name}}</small><hr>
        </div>
    </div>
    
<button type="button" data-toggle="modal" class="btn btn-sm btn-primary" data-target="#checkoutModal">
    <a class="btn col-md-1 btn-sm btn-primary"  href="{{$post->id}}/edit" id="edit" style="text-decoration:none;">Edit Post</a>
</button>
     @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a class="btn btn-sm btn-success col-md-1" href="{{$post->id}}/edit" id="edit" style="text-decoration:none;">Edit Post</a>
            {!! Form::open(['action'=>['postsController@destroy', $post->id], 'method'=>'POST', 'class'=>'col-md-4']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete Post',  [ 'class'=>'btn btn-sm btn-primary'])}}
            {!! Form::close() !!}
        @endif  
    @endif
    </div>
</div> --}}
@endsection