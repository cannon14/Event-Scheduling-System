{{ HTML::style('css/location_styles.css'); }}

@extends('layouts.master')

@section('content')

<div class="row center-block">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h1>{{$location->name}}</h1>
            </div><!--panel-heading-->
            <div class="panel-body text-center">

            @if (count($events) > 0)
            <div class="table-responsive">
            <table class="table table-striped table-hover">
            <thead>
                <th>Event Name</th>
                <th>Scheduler</th>
                <th>Department</th>
                <th>Date</th>
                <th>Time</th>
                <th>Date Scheduled</th>
            </thead>
                <tbody>

                @foreach($events as $event)
                <tr>
                    <td>{{$event->event_name}}</td>
                    <td>{{$event->user->fname . " " . $event->user->lname}}</td>
                    <td>{{$event->user->department}}</td>
                    <td>{{$event->start_date . " - " . $event->end_date}}</td>
                    <td>{{$event->start_time . " - " . $event->end_time}}</td>
                    <td>{{$event->created_at}}</td>
                </tr>
                @endforeach

                </tbody>
            </table>
            </div>
            @else
                <p>There are currently no events scheduled for {{$location->name}}!</p>
            @endif
            </div><!--panel-body-->
        </div><!--panel-->
    </div><!--col-->
</div><!--row-->

<div class="row center-block">
    <div class="col-lg-12">
        <a href="#" role="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addEvent">Schedule Event!</a>
    </div>
</div>



<div class="modal fade" id="addEvent">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Add Event</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" target="event/addEvent">
        <div class="form-group">
        <label for="username" class="control-label col-lg-3">Schedular's Name:</label>
            <div class="col-lg-9">
                <select id="username" name="username" class="form-control">
                <option value="">--SELECT NAME--</option>
                <option value="anonymous">Anonymous</option>
                @foreach ($users as $user)
                    <option value="{{$user->fname." ".$user->lname}}">{{$user->fname." ".$user->lname}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
        <label for="name" class="control-label col-lg-3">Event Name:</label>
            <div class="col-lg-9">
                <input type="text" id="event_name" name="event_name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="start" class="control-label col-lg-3">Start Date/Time:</label>
            <div class="col-lg-9">
                            <div class='input-group date' id='start_date_time'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
            </div>
        </div>
        <div class="form-group">
            <label for="start" class="control-label col-lg-3">End Date/Time:</label>
            <div class="col-lg-9">
<div class='input-group date' id='end_date_time'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add Event</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
            $(function () {
                $('#start_date_time, #end_date_time').datetimepicker({
                    pickDate: true,                 //en/disables the date picker
                        pickTime: true,                 //en/disables the time picker
                        useMinutes: true,               //en/disables the minutes picker
                        useSeconds: false,               //en/disables the seconds picker
                        useCurrent: true,               //when true, picker will set the value to the current date/time
                        minuteStepping:5,               //set the minute stepping
                        showToday: true,                 //shows the today indicator
                        language:'en'
                });
            });
        </script>

@stop