@extends('layouts.appb')

@section('content')
<div style="background: #fff;padding: 20px;" class="col-md-8 col-md-offset-2 col-sm-12">
    <h2></h2>
    <form action="{{route('docs.update', [$sub->id])}}" method='put'>
        @csrf
    	<div class="form-group">
    		<select name="sub_cat" id="inlineFormCustomSelect" class="custom-select mr-sm-2">
    			<option selected>Choose sub category</option>
    			@foreach ($subcats as $subcat)
    				<option value="{{$subcat->id}}">{{$subcat->title}}</option>
    			@endforeach
    		</select>
    	</div>
    	<button type="submit" class="btn btn-primary">Update</button>
    </form>

    {{-- {!! Form::open(['action' => ['SubcatController@update', $sub->id], 'method' => 'POST']) !!}
        <div class='form-group'>
            {{Form::label('title', 'Select the subcategory')}}
            {{Form::select('sub_cat', ['subcats->id' => $subcats->title])}}
            {{Form::text('title', $sub->sub_cat, ['class'=>'form-control', 'placeholder'=>'Title', 'required' => ''])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('submit',  ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!} --}}
</div>
@endsection
