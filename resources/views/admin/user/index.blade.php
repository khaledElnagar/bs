@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/user">Users</a>
    </li>
@endsection
@section('content')

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Users</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>discount</th>
                            <th>age</th>
                            <th>Date Created</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->country}}</td>
                                <td>{{$user->city}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    @if($user->image)
                                        <i class=" glyphicon glyphicon-camera"></i>
                                    @else
                                        <i class=" glyphicon glyphicon-remove"></i>
                                    @endif
                                </td>
                                <td>{{$user->discount}}</td>
                                <td>{{$user->age}}</td>
                                <td>{{$user->created_at}}</td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

@endsection