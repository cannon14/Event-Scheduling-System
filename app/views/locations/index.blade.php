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
                            <td>{{$location->name}}</td>
                            <td>{{$location->capacity}}</td>
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