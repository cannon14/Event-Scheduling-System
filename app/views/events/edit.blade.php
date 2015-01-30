@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-lg-12">
			<h2>Edit Event</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			{{ Form::open(array("url"=>"events/".$event->event_id, "method"=>"PUT", "class"=>"form-horizontal")) }}
			<div class="form-group">
				{{ Form::label('event_name', 'Event Name', array('class'=>'control-label')) }}
				{{ Form::text('event_name', $event->event_name, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('location_id', 'Location', array('class'=>'control-label')) }}
				{{ Form::select('location_id', $locations, $event->location->location_id, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('description', 'Description', array('class'=>'control-label')) }}
				{{ Form::textarea('description', $event->event_description, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('start_dtg', 'Start', array('class'=>'control-label')) }}
				<div class="datetimepicker input-append date">
					{{ Form::text('start_dtg', $event->start_dtg, array('class'=>'form-control', 'data-format'=>'dd-MM-yyyy hh:mm:ss')) }}
					<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('end_dtg', 'End', array('class'=>'control-label')) }}
				<div class="datetimepicker input-append date">
					{{ Form::text('end_dtg', $event->end_dtg, array('class'=>'form-control', 'data-format'=>'dd-MM-yyyy hh:mm:ss')) }}
					<span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
				</div>
			</div>
			<div class="form-group">
				{{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>

@stop