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
                {{ Form::text('start_dtg', Input::old('starg_dtg'), array('class'=>'form-control', 'data-datepicker' => 'datepicker')) }}
            </div>
            <div class="form-group">
                {{ Form::label('end_dtg', 'End', array('class'=>'control-label')) }}
                {{ Form::text('end_dtg', Input::old('end_dtg'), array('class'=>'form-control', 'data-datepicker' => 'datepicker')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Create', array('class'=>'btn btn-primary')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>


@stop