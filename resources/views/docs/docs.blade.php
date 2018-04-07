{{--@extends('layouts.app')

@section('content')
@guest
<div class="jumbotron text-center">
  <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
  <a class="btn btn-success" href="{{ route('register') }}">Register</a>
</div>
    
@else
<mynew :user="{{ Auth::user() }}"></mynew>
<div class="container"> --}}
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    File Upload page
                    <a href="/" class="btn btn-primary pull-right">Back</a>
                </div>
                <div class="card-body">
                  <a class="btn btn-primary" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form> --}}

                        {{-- <section class="content">
                    
                          <div class="box-header">
                            <h3 class="box-title">Docs</h3>
                          </div> --}}
                          <!-- /.box-header -->
                          {{-- <div class="box-body"> --}}
                            {{-- <div class="row justify-content-center">
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <button class="btn btn-primary btn-filter">
                                              <span class="gryphicon gryphicon-filter">Filter</span>
                                            </button>
                                        </div>
                                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                              <table class="table table-hover table-striped table-condenced">
                                <thead>
                                  <th>Name</th>
                                  <th>Category</th>
                                  <th>add sub category</th>
                                  <th>Action</th>
                                  <th></th>
                                </thead>
                                <tbody>
                                @foreach($docs as $doc)
                                    <tr class="filters">
                                      @foreach($category as $key => $value)
                                        @if(
                                          Auth::user()->credentials == 'directors' && $value->directors == 1 ||
                                          Auth::user()->credentials == 'shareholders' && $value->shareholders == 1 ||
                                          Auth::user()->credentials == 'managers' && $value->managers == 1 ||
                                          Auth::user()->credentials == 'employees' && $value->employees == 1
                                          )
                                          @if($value->id == $doc->category_id)
                                            <td>{{$doc->name}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>
                                              <a class="btn" href="docs/{{$doc->id}}/edit" id="edit" style="text-decoration:none;">
                                                <i class="fa fa-plus" style="color: #06f; font-size: 20px;" @click="add(key)"></i>
                                              </a>
                                            </td>
                                            <td><a href="/{{$doc->path}}"> <i class="fa fa-download" style="color: #00f; font-size: 20px;"></i></a></td>
                                            <td></td>
                                          @endif             
                                        @endif             
                                      @endforeach         
                                    </tr>
                                @endforeach
                                </tbody>
                              </table>
                            </table> --}}
                            {{-- {{ $docs->appends(['sort' => 'category_id'])->links() }} 
                          </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  
                </div>
                <div class="card-footer"></div>
                @endguest
            </div>
        </div>
    </div>
    {{-- <addsubs  @closeRequest="close" :open_request="dispsub"></addsubs> 
</div>
@endsection--}}


<!DOCTYPE html>
<html lang="en">
<head><title>{{ config('app.name', 'Laravel') }}</title>
<link href="{{ asset('css/completedTasks.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery3.min.js') }}"></script>
<script src="{{ asset('js/completedTasks.js') }}"></script>
</head>
<body>
<div class="container">
{{-- <mynew :user="{{ Auth::user() }}"></mynew> --}}
    <h6><a href="http://eboard.dev/home#/" style="text-decoration: none">Document upload</a>>category</h6>
    <hr>
    <!--<p>Inspired by this <a href="http://bootsnipp.com/snippets/featured/panel-tables-with-filter">snippet</a></p>-->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary filterable"">
                <div class="card-header text-center">
                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Category" disabled></th>
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    @foreach($docs as $doc)
                        <tr class="filters">
                          @foreach($subcats as $key => $value)
                            {{-- @if(
                              Auth::user()->credentials == 'directors' && $value->directors == 1 ||
                              Auth::user()->credentials == 'shareholders' && $value->shareholders == 1 ||
                              Auth::user()->credentials == 'managers' && $value->managers == 1 ||
                              Auth::user()->credentials == 'employees' && $value->employees == 1
                              )
                              @if($value->id == $doc->category_id) --}}
                                <td>{{$doc->name}}</td>
                                <td>{{$value->title}}</td>
                                <td>
                                  <a class="btn" href="docs/{{$doc->id}}/edit" id="edit" style="text-decoration:none;">
                                    <i class="fa fa-plus" style="color: #06f; font-size: 20px;" @click="add(key)"></i>
                                  </a>
                                  <a href="/{{$doc->path}}"> <i class="fa fa-download" style="color: #00f; font-size: 20px;"></i>
                                  </a>
                                </td>
                              {{-- @endif             
                            @endif  --}}            
                          @endforeach         
                        </tr>
                    @endforeach
                  </tr>
                </tbody>
            </table>
            {{ $docs->appends(['sort' => 'category_id'])->links() }} 
        </div>
    </div>
</div>
</div>
</body>
</html>