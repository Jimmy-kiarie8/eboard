@extends('layouts.app')

@section('content')
<mynew :user="{{ Auth::user() }}"></mynew>
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <div class="container">
              <div class="row">
                  <div class="col-md-9">
                      <div class="card">
                          <div class="card-header text-center">
                              File Upload page
                              <a class="btn" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              <a href="/" class="btn btn-primary pull-right">Back</a>
                          </div>
                          <div class="card-body">
                              @if (session('status'))
                                 <div class="alert alert-success">
                                     {{ session('status') }}
                                 </div>
                             @endif
                             <!-- <div class="col-md-12"> -->
                                 <file-management :subs="{{$subcat}}" :settings="{{ json_encode($props) }}"></file-management>
                             <!-- </div> -->
                             <!-- <div class="col-md-12"> -->
                                 <attachment-list :subs="{{$subcat}}" :settings="{{ json_encode($props) }}"></attachment-list>
                             <!-- </div> -->
                          </div>
                          <div class="card-footer"></div>
                      </div>
                  </div>
              </div>
          </div>
        </v-layout>
    </v-container>
</v-content>
@endsection