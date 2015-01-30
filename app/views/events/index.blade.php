@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <h2>Events</h2>
        </div>
        <div class="col-lg-2 text-right">
            {{ link_to(url('events/create'), 'Add Event', array('class'=>'btn btn-primary')) }}
        </div>
    </div>
    <!--row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th>Event ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Scheduler</th>
                        <th>Department</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->event_id}}</td>
                            <td>{{$event->event_name}}</td>
                            <td>{{$event->event_description}}</td>
                            <td>{{$event->user->firstname.' '.$event->user->lastname}}</td>
                            <td>{{$event->department->department_name}}</td>
                            <td>{{$event->start_dtg}}</td>
                            <td>{{$event->end_dtg}}</td>
                            <td>
                                {{ Form::open(array('url' => url('events/'.$event->event_id), 'method' => 'GET', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                {{ Form::close() }}
                                {{ Form::open(array('url' => url('events/'.$event->event_id.'/edit'), 'method' => 'GET', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-pencil"></span></button>
                                {{ Form::close() }}
                                {{ Form::open(array('url' => url('events/'.$event->event_id), 'method' => 'DELETE', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!--col-lg-12-->
    </div><!--row-->
@stop