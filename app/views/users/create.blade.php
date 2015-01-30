@extends('layouts.master')

@section('content')

	<div class="row">
		<div class="col-sm-12">
			<h2>Create User</h2>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12">
			{{ Form::open(array("url"=>"users", "method"=>"POST", "class"=>"form-horizontal")) }}
			<div class="form-group">
				{{ Form::label('title', 'Title', array('class'=>'control-label')) }}
				{{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('department_id', 'Department', array('class'=>'control-label')) }}
				{{ Form::select('department_id', $departments, '', array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('firstname', 'First Name', array('class'=>'control-label')) }}
				{{ Form::text('firstname', Input::old('firstname'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('lastname', 'Last Name', array('class'=>'control-label')) }}
				{{ Form::text('lastname', Input::old('lastname'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email', array('class'=>'control-label')) }}
				{{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('password1', 'Password', array('class'=>'control-label')) }}
				{{ Form::password('password1', array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('confirm_password', 'Confirm', array('class'=>'control-label')) }}
				{{ Form::password('confirm_password', array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('telephone', 'Telephone', array('class'=>'control-label')) }}
				{{ Form::text('telephone', Input::old('telephone'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Create', array('class'=>'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>


@stop