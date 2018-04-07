@extends('layouts.app')

@section('title', 'Edit User ' . $user->first_name)

@section('content')
<mynew :user="{{ Auth::user() }}"></mynew>
<div class="row justify-content-center">
<div id="user" class="col-md-7">
<div id="user">
    <h1 class="text-center">Edit {{ $user->name }}</h1>
    <div class="row">
        <div class="page-action pull-right">
            <a href="{{ route('users.index') }}" class="btn btn-success btn-sm"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
                            @include('user._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection