@extends('layouts.interface')

@section('content')

{{ HTML::style('css/interface_styles.css'); }}

<div class="row text-center info_row">
    <div class="col-sm-4">
        <h2>Current</h2>
        @if($currentEvent != null)
            <div class="meeting_name">{{$currentEvent->event_name}}</div>
            <div class="scheduler">{{$currentEvent->user->firstname . " " . $currentEvent->user->lastname}}</div>
            <div class="department">{{$currentEvent->department->department_name}}</div>
        @else
            <div>None Scheduled!</div>
        @endif
    </div>
    <div class="col-sm-4">
        <div id="location_name">{{$location->location_name}}</div>
    </div>
    <div class="col-sm-4">
        <h2>Next</h2>
        @if($nextEvent != null)
            <div class="meeting_name">{{ $nextEvent->event_name }}</div>
            <div class="dtg">Start: {{$nextEvent->start_dtg}}</div>
            <div class="dtg">End: {{$nextEvent->end_dtg}}</div>
            <div class="scheduler">{{$nextEvent->user->firstname . " " . $nextEvent->user->lastname}}</div>
            <div class="department">{{$nextEvent->department->department_name}}</div>
        @else
            <div>None Scheduled!</div>
        @endif
    </div>
</div>

<br>

<div class="row" id="status_row">
    <div class="col-lg-12 text-center">
        <div id="status">VACANT</div>
        <div id="current_event_timer">00:00:00</div>
    </div>
</div>

<div class="row" id="control_row">
    <div class="col-sm-2 text-left"><button type="button" class="btn btn-primary btn-lg" id="plusFifteen">+
            15min</button></div>
    <div class="col-sm-8 text-center">
        <button type="button" class="btn btn-primary btn-lg" id="start">Start</button>
        <button type="button" class="btn btn-primary btn-lg" id="stop" disabled>Stop</button>
        <button type="button" class="btn btn-primary btn-lg" id="reset" disabled>Reset</button>
    </div>
    <div class="col-sm-2 text-right"><button type="button" class="btn btn-primary btn-lg" id="minusFifteen">-
            15min</button></div>
</div>

<div class="modal fade" id="addSchedulerModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Schedule</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Schedule">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(document).ready(function() {
    //Check database every 5 minutes

    setInterval(function(){checkForEvents()}, 100000);

    function checkForEvents() {
        $.ajax({
            type: "POST",
            url: "checkDatabase.php",
            data: { id: '1' }
        })
        .done(function( msg ) {
        });
    }

    var seconds = 0;
    var minutes = 0;
    var hours = 0;
    var time = null;

    $('#plusFifteen').click(function() {
        seconds += (15*60);
        displayTime();
    });

    $('#minusFifteen').click(function() {
        if(seconds >= (15*60)) {
            seconds -= (15*60);
        }
        else if (seconds < (15*60)) {
            seconds = 0;
        }
        displayTime();
    });

    $('#start').click(function() {

        $.ajax({
            type: "POST",
            url: "checkDatabase.php",
            data: { id: "1" }
        })
        .done(function( msg ) {
            alert( "Data Saved: " + msg );
        });

        if(seconds > 0) {
            $('body').css('background-color','#d9534f');
            $('#status').html("OCCUPIED");
            $(this).prop('disabled', true);
            $('#stop').prop('disabled', false);
            time = setInterval(function(){myTimer()}, 1000);
        }
        else {
            alert("Select a time interval!");
        }

    });

    $('#stop').click(function() {
        $('body').css('background-color','#87ae4b');
        $('#status').html("VACANT");
        $('#start').prop('disabled', false);
        $('#reset').prop('disabled', false);
        $(this).prop('disabled', true);
        clearInterval(time);
    });

    $('#reset').click(function() {
        $('body').css('background-color','#87ae4b');
        $('#status').html("VACANT");
        clearInterval(time);
        hours = 0;
        minutes = 0;
        seconds = 0;
        displayTime();
        $('#stop').prop('disabled', true);
        $('#start').prop('disabled', false);

    });

    function getHours() {
        hours = seconds / 60 / 60 % 24;

        return hours;
    }

    function getMinutes() {
        minutes = seconds / 60 % 60;

        return minutes;
    }

    function getSeconds() {
        return seconds % 60;
    }

    function getTime() {
        var timeStr = "";

        h = Math.floor(getHours());
        if(h < 10) {
            timeStr += "0";
        }
        timeStr += h+":";

        m = Math.floor(getMinutes());
        if(m < 10) {
            timeStr += "0";
        }
        timeStr += m+":";

        s = Math.floor(getSeconds());
        if(s < 10) {
            timeStr += "0";
        }
        timeStr += s;

        return timeStr;
    }

    function displayTime() {
        $('#current_event_timer').html(getTime());
    }

    function myTimer() {
        seconds--;

        if(seconds <= 0) {
            clearInterval(time);
        }
        else {
            displayTime();
        }
    }
});
</script>


@stop