@extends('layouts.master')

@section('content')
{{--
<mynew :user="{{ Auth::user() }}"></mynew>--}}
<my-post :auth="{{ Auth::user() }}"></my-post>

@endsection

<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod cum esse ut earum nisi, voluptates quo aspernatur harum iure id reprehenderit sit consectetur mollitia eveniet repellendus laudantium ad vero, corporis! -->