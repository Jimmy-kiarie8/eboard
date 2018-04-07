@extends('layouts.appb')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-heading text-center">My Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-sm btn-primary" href="posts/create">Create a post</a><hr>
                    <h6 class="text-center">Blog Page</h6>
                    @if(count($posts) > 0)
                        <table class='table table-striped table-condensed table-hover'>
                            <thead>
                                <th>Title</th>
                                <th></th>
                            </thead>
                            @foreach($posts as $post)
                            <tr>
                                <td>    
                                    {{$post->title}} {{--  posted by~{{$post->user->name}}<br>Written on {{$post->created_at}}  --}}
                                </td>
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
                    @else
                    <p>You have no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 