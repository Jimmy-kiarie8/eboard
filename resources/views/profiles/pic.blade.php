@extends('layouts.app')

@section('content')
<mynew :user="{{ Auth::user() }}"></mynew>
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-8 col-offset-3">
            <div class="card card-primary">
                <div class="card-header text-center">{{Auth::user()->name}}'s Profile</div>
				
                <div style="background: #f9f9f9" class="card-body col-md-4 col-offset-2 text-center">
                    <a href="/profiles" class="btn btn-primary">Cancle</a><hr>
                	<img style="width: 60%;" src="{{Auth::user()->profile}}" alt=""><br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif                    
                </div>
                <form class="container" action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                         {{csrf_field()}}
                        <input type="file" name="profile"><br><br>
                        <input type="submit" class="btn btn-info">
                    </div>
                </form>
                <div class="card-footer">
                	<h5 class="text-center">Hae {{Auth::user()->name}} welcome.</h5>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
</v-layout>
</v-container>
</v-content>
@endsection
