@extends('layouts.app')

@section('title', 'Create')

@section('content')
<mynew :user="{{ Auth::user() }}"></mynew>
<div class="row justify-content-center">
<div id="user" class="col-md-7">
<div id="user">
    <h1 class="text-center">Create</h1><hr>
    <div class="row">
        <div class="page-action pull-right">
            <a href="{{ route('users.index') }}" class="btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {!! Form::open(['route' => ['users.store'] ]) !!}
                @include('user._form')
                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</div>
@endsection
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea ipsam ex eveniet possimus error aliquam magnam placeat, doloremque odit nesciunt maxime ullam saepe reprehenderit facilis, a totam, eligendi, sunt voluptatibus! -->