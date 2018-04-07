@extends('layouts.master')

@section('title')
 eboard
@endsection

@section('content')

@guest
<div class="w3-panel w3-blue w3-card-4 text-center" style="width: 50%; margin: auto; margin-top: 40px; padding: 50px 30px">
	<h2>Welcome</h2><hr>	
	<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor facilis excepturi, laboriosam omnis. Aliquam, omnis harum commodi temporibus labore eius? Inventore tempora, repellendus. Quos alias, voluptates sunt dolor eum quaerat.</p>
  <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
  <a href="{{ route('register') }}" class="btn btn-success">Register</a>
</div>
@else
<!-- Sidebar/menu -->
<mynew :user="{{ Auth::user() }}"></mynew>

<!-- Overlay effect when opening sidebar on small screens -->
<!-- <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div> -->

<router-view :user="{{ Auth::user() }}"></router-view>
<!-- <overview></overview> -->

<!-- <mysidebar></mysidebar> -->

@endguest
@endsection