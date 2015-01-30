@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <h2>Locations</h2>
        </div>
        <div class="col-lg-2 text-right">
            {{ link_to(url('locations/create'), 'Add Location', array('class'=>'btn btn-primary')) }}
        </div>
    </div>
    <!--row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table datatable">
                <thead>
                <tr>
                    <th>Location ID</th>
                    <th>Location Name</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                        <tr>
                            <td>{{$location->location_id}}</td>
                            <td>{{$location->location_name}}</td>
                            <td>{{$location->location_capacity}}</td>
                            <td>
                                {{ Form::open(array('url' => url('locations/'.$location->location_id), 'method' => 'GET', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                {{ Form::close() }}
                                {{ Form::open(array('url' => url('locations/'.$location->location_id.'/edit'), 'method' => 'GET', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-pencil"></span></button>
                                {{ Form::close() }}
                                {{ Form::open(array('url' => url('locations/'.$location->location_id), 'method' => 'DELETE', 'class'=>'action_buttons')) }}
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