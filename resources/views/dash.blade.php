@extends('layouts.app')

@section('content')
<mynew :user="{{ Auth::user() }}"></mynew>
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header text-center">
                              
                          </div>
                          <div class="card-body">
                            @if (session('status'))
                                 <div class="alert alert-success">
                                     {{ session('status') }}
                                 </div>
                            @endif
                            <h2 class="text-center">Welcome</h2>
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