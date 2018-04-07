@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    Admin Home
                </div>
                <div class="card-body">
                    @if (session('status'))
                       Loged out
                   @else
                      <mycompany></mycompany>
                   @endif
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@endsection