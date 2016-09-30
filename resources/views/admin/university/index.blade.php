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
                            <th>Approved</th>
                            <th>Date Created</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($universities as $university)
                            <tr>
                                <td>{{$university->name}}</td>
                                <td>{{$university->email}}</td>
                                <td>{{$university->address}}</td>
                                <td>{{$university->country}}</td>
                                <td>{{$university->city}}</td>
                                <td>{{$university->phone}}</td>
                                <td>
                                    @if($university->image)
                                        <i class=" glyphicon glyphicon-camera"></i>
                                    @else
                                        <i class=" glyphicon glyphicon-remove"></i>
                                    @endif
                                </td>
                                <td>{{$university->discount}}</td>
                                <td>
                                    @if($university->approved_university == 1)
                                        <i class=" glyphicon glyphicon-ok"></i>
                                    @else
                                        <i class=" glyphicon glyphicon-remove"></i>
                                    @endif
                                </td>
                                <td>{{$university->created_at}}</td>
                                <td class="center">
                                    <a class="btn">
                                        <form action="{{url('')}}/admin/university/{{$university->id}}/edit" method="POST" target="_blank">
                                            <input type="hidden" name="_method" value="Get">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-info" value="Edit">
                                        </form>
                                    </a>
                                </td>

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