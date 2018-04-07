@extends('layouts.survey')

@section('content')
{{-- <div class="card">
    <div class="card-content">
        <div class="card-title">
            <form action="create" method="post" id="boolean">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="title" name="title" class="form-control">
                        <label for="title">Title</label>
                    </div>
                    <div class="input-field col s12">
                        <textarea name="description" id="description" cols="30" rows="10" class="materialize-textarea"></textarea>
                        <label for="description">Description</label>
                    </div>
                    <div class="input-field col s12">
                        <button class="btn waves-effect wave-light">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<div class="card">
      <div class="card-content">
      <span class="card-title"> Add Survey</span>
      <form method="POST" action="create" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">    
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Survey Title</label>
          </div>          
          <div class="input-field col s12">
            <textarea name="description" id="description" class="materialize-textarea"></textarea>
            <label for="description">Description</label>
          </div>
          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop