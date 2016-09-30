@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/category">Categories</a>
    </li>
@endsection
@section('content')

    <form action="{{url('')}}/admin/category/update" method="POST">
        <input type="hidden" name="_method" value="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-primary btn-lg" value="Select Categories from sqlserver">
    </form>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Categories</h2>

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
                            <th>Date Created</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td class="center">{{$category->created_at}}</td>
                                <td class="center">
                                    <span class="label-success label label-default">Active</span>
                                </td>
                                <td class="center">
                                    <a class="btn">
                                        <form action="{{url('')}}/admin/category/{{$category->id}}/edit" method="POST">
                                            <input type="hidden" name="_method" value="GET">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-info" value="Edit">
                                        </form>
                                    </a>
                                    <a class="btn">

                                        <form action="{{url('')}}/admin/category/{{$category->id}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-danger" value="Delete">
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