@extends('layouts.master')

@section('content')

	@foreach($locations as $location)
		<div class="row location_ui_row">
			<div class="col-sm-12">
				{{ Form::open(array('url' => url('location/'.$location->location_id), 'method' => 'GET', 'class'=>'location_ui_button')) }}
				<button type="submit" class="btn btn-primary btn-lg btn-block">{{$location->location_name}} Interface
				</button>
				{{ Form::close() }}
			</div>
		</div>
	@endforeach

	<br>

	<div class="row">
		<div class="col-sm-12">
			<div id='calendar'></div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				editable: true,
				events: eval({{$events}})
			});
		});
	</script>
@stop
