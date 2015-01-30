@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<h2>Create Location</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			{{ Form::open(array("url"=>"locations", "method"=>"POST", "class"=>"form-horizontal")) }}
			<div class="form-group">
				{{ Form::label('location_name', 'Location Name', array('class'=>'control-label')) }}
				{{ Form::text('location_name', Input::old('location_name'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('location_capacity', 'Capacity', array('class'=>'control-label')) }}
				{{ Form::text('location_capacity', Input::old('location_capacity'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Create', array('class'=>'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>

@stop