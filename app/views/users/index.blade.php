@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <h2>Users</h2>
        </div>
        <div class="col-lg-2 text-right">
            {{ link_to(url('users/create'), 'Add User', array('class'=>'btn btn-primary')) }}
        </div>
    </div>
    <!--row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Title</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->title}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->lastname}}</td>
                            <td>{{$user->department->department_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->telephone}}</td>
                            <td>
                                {{ Form::open(array('url' => url('users/'.$user->user_id), 'method' => 'GET', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                {{ Form::close() }}
                                {{ Form::open(array('url' => url('users/'.$user->user_id.'/edit'), 'method' => 'GET', 'class'=>'action_buttons')) }}
                                <button type="submit"><span class="glyphicon glyphicon-pencil"></span></button>
                                {{ Form::close() }}
                                {{ Form::open(array('url' => url('users/'.$user->user_id), 'method' => 'DELETE', 'class'=>'action_buttons')) }}
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