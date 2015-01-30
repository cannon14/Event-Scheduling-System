@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<h2>Edit Location</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			{{ Form::open(array("url"=>"locations/".$location->location_id, "method"=>"PUT", "class"=>"form-horizontal")) }}
			<div class="form-group">
				{{ Form::label('location_name', 'Location Name', array('class'=>'control-label')) }}
				{{ Form::text('location_name', $location->location_name, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('location_capacity', 'Capacity', array('class'=>'control-label')) }}
				{{ Form::text('location_capacity', $location->location_capacity, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>

@stop