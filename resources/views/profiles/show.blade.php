@extends('layouts.appb')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">{{Auth::user()->name}}'s Profile</div>
				
                <div style="background: #f9f9f9" class="panel-body">
                	<img style="width: 20%;" src="{{Auth::user()->pic}}" alt=""><br>
					<a style="text-decoration: none;" href="/profiles/{{Auth::user()->id}}/edit">Update profile picture</a>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                </div>
                <div class="panel-footer">
                	<h5 class="text-center">Hae {{Auth::user()->name}} welcome.</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
