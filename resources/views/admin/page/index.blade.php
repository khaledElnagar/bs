@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/page">Pages</a>
    </li>
@endsection
@section('content')

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class=" glyphicon glyphicon-file"></i> Pages</h2>

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
                            <th>Title</th>
                            <th>Details</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{$page->title}}</td>
                                <td>{{str_limit($page->details,100)}}</td>
                                <td class="center">{{$page->created_at}}</td>
                                <td class="center">{{$page->updated_at}}</td>
                                <td class="center">
                                    <a class="btn">
                                        <form action="{{url('')}}/admin/page/{{$page->id}}/edit" method="POST"
                                              target="_blank">
                                            <input type="hidden" name="_method" value="GET">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-info" value="Edit">
                                        </form>
                                    </a>
                                    <a class="btn">

                                        <form action="{{url('')}}/admin/page/{{$page->id}}" method="POST">
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