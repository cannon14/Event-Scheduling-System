@extends('layouts.master')

@section('content')

<div class="row text-center">
    <div class="col-lg-12">
        <h2>CREDITCARDS.COM</h2>
        <h3>CONFERENCE ROOM SCHEDULING SYSTEM</h3>
    </div>
</div>

<div class="row center-block">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>Display User Interface</h3>
            </div><!--panel-heading-->
            <div class="panel-body text-center">
                @foreach($locations as $location)
                    <a href="locationUI/{{$location->id}}" role="button" class="btn btn-primary btn-lg btn-block">{{ $location->name }}</a>
                @endforeach
            </div><!--panel-body-->
        </div><!--panel-->
    </div><!--col-->
</div><!--row-->

<div class="row center-block">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h3>View Events by Conference Room</h3>
            </div><!--panel-heading-->
            <div class="panel-body text-center">
                @foreach($locations as $location)
                    <a href="location/{{$location->id}}" role="button" class="btn btn-primary btn-lg btn-block">{{ $location->name }}</a>
                @endforeach
            </div><!--panel-body-->
        </div><!--panel-->
    </div><!--col-->
</div><!--row-->

<div class="row center-block">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
            </div><!--panel-heading-->
            <div class="panel-body text-center">
                <button role="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addUser">ADD USER</button>
            </div><!--panel-body-->
        </div><!--panel-->
    </div><!--col-->
</div><!--row-->

<div class="modal fade" id="addUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Add Event</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" id="addUserForm" role="form" target="user/addUser">
        <div class="form-group">
            <label for="fname" class="control-label col-lg-3">First Name:</label>
            <div class="col-lg-9">
                <input type="text" id="fname" name="fname" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="lname" class="control-label col-lg-3">Last Name:</label>
            <div class="col-lg-9">
                <input type="text" id="lname" name="lname" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="control-label col-lg-3">Position:</label>
            <div class="col-lg-9">
                <input type="text" id="position" name="position" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="department" class="control-label col-lg-3">Department:</label>
            <div class="col-lg-9">
                <input type="text" id="department" name="department" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="control-label col-lg-3">Email:</label>
            <div class="col-lg-9">
                <input type="text" id="email" name="email" class="form-control">
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Add Event">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(document).ready(function() {

    $("#addUserForm").validate({
     rules: {
        fname: "required",
        lname: "required",
        position: "required",
        department: "required",
        email: "required"
        }

    });

});
</script>
@stop
