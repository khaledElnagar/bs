@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin">Dashboard</a>
    </li>
@endsection
@section('content')
    <div class=" row">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="Members" class="well top-block" href="#">
                <i class="glyphicon glyphicon-user blue"></i>
                <div>Total Members</div>
                <div>{{$users_number}}</div>
            </a>
        </div>


        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="Orders" class="well top-block" href="#">
                <i class="glyphicon glyphicon-shopping-cart yellow"></i>

                <div>Orders</div>
                <div>{{$orders_number}}</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="Messages" class="well top-block" href="#">
                <i class="glyphicon glyphicon-envelope red"></i>

                <div>Messages</div>
                <div>{{$messages_number}}</div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Responsive, Swipable Table</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default">
                            <i class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default">
                            <i class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Date registered</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td>Admin</td>
                            <td class="center">{{$admin->created_at}}</td>
                            <td class="center">Admin</td>
                            <td class="center">
                                <span class="label-success label label-default">Active</span>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" href="admin/{{$admin->id}}/edit">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div>

@endsection