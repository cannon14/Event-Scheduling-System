@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h2>Create Event</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {{ Form::open(array("url"=>"events", "method"=>"POST", "class"=>"form-horizontal")) }}
            <div class="form-group">
                {{ Form::label('event_name', 'Event Name', array('class'=>'control-label')) }}
                {{ Form::text('event_name', Input::old('event_name'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('location_id', 'Location', array('class'=>'control-label')) }}
                {{ Form::select('location_id', $locations, array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('description', 'Description', array('class'=>'control-label')) }}
                {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::label('start_dtg', 'Start', array('class'=>'control-label')) }}
                <div class="datetimepicker input-append">
                {{ Form::text('start_dtg', Input::old('start_dtg'), array('class'=>'form-control')) }}
                <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('end_dtg', 'End', array('class'=>'control-label')) }}
                <div class="datetimepicker input-append date">
                {{ Form::text('end_dtg', Input::old('end_dtg'), array('class'=>'form-control')) }}
                <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
                </div>
            </div>
            <div class="form-group">
                {{ Form::submit('Create', array('class'=>'btn btn-primary')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@stop