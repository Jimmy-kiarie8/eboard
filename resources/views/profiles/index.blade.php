@extends('layouts.app')

@section('content')
@if(!Auth::guest())
<mynew :user="{{ Auth::user() }}"></mynew>
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="card card-primary">
                <div class="card-heading text-center">
                    {{--<span>
                        <img style="width:5%;" class="img-circle" src='/storage/profile/{{ Auth::user()->profile }}'> 
                    </span>--}}
                        {{Auth::user()->name}}'s Profile
                    
                </div>
				
                <div style="background: #f9f9f9" class="card-body">
                    <div style="background: #f5f5f5;" class="thumbnail text-center">
                    	<img style="width: 15%;" class="img-circle" src="{{Auth::user()->profile}}" alt=""><hr>
    					<a style="text-decoration: none;" href="{{url('/')}}/changePhoto" class="btn btn-sm btn-primary">Update profile</a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif   
                    @if(count($posts) > 0)

                    <div class="table-responsive">
                        <table class='table table-striped table-condensed table-hover'>
                            <thead>
                                <th>Title</th>
                                <th>Posted on</th>
                                {{-- <th>Image</th> --}}
                                <th></th>
                            </thead>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                {{-- <td style="width: 30%;"><img class="img-circle" style="width: 30%;" src="/storage/cover_image/{{$post->cover_image}}" alt=""></td> --}}
                                <td>
                                    <a class="glyphicon glyphicon-pencil btn btn-sm btn-default" href="posts/{{$post->id}}/edit"></a> 
                                    {!! Form::open(['action'=>['postsController@destroy', $post->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete',  [ 'class'=>'btn btn-xs btn-info'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div><hr>
                    {{$posts->links()}}
                    @else
                    <div class="text-center">   
                        <p>{{Auth::user()->name}} You don't have any posts</p>
                        <a href="/posts/create" class="btn-success btn btn-sm">Post somenthing</a>
                    </div>
                    @endif

                </div>
                <div class="card-footer">
                	<h5 class="text-center">Hae {{Auth::user()->name}} welcome.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
</v-layout>
</v-container>
</v-content>

@else
Please login
@endif
@endsection
