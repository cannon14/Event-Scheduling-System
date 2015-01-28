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
                            <td>{{$event->name}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->scheduler}}</td>
                            <td>{{$event->department}}</td>
                            <td>{{$event->start_dtg}}</td>
                            <td>{{$event->end_dtg}}</td>
                            <td>
                                <a href="#"><span class="glyphicon glyphicon-search"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="#"><span class="glyphicon glyphicon-remove"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->
        </div><!--col-lg-12-->
    </div><!--row-->
@stop