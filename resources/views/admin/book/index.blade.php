@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/book">Books</a>
    </li>
@endsection
@section('content')

    <form action="{{url('')}}/admin/book/update" method="POST">
        <input type="hidden" name="_method" value="Post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="box-content">
            <div class="control-group">
                <label class="control-label" for="selectError">Categories</label>

                <div class="controls">
                    <select id="selectError" name="category" data-rel="chosen" style="min-width:300px;">
                        @foreach($categories as $category)
                            <option value="{{$category->code}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-lg" value="Select Books from sqlserver">
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
                            <th>Code</th>
                            <th>ISBN</th>
                            <th>Date Created</th>
                            <th>Date Updated</th>
                            <th>Status</th>
                            <th>Updated</th>
                            <th>Load From Amazon</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book->name}}</td>
                                <td>{{$book->code}}</td>
                                <td>{{$book->isbn}}</td>
                                <td class="center">{{$book->created_at}}</td>
                                <td class="center">{{$book->updated_at}}</td>
                                <td class="center">
                                    @if($book->amazon_flag)
                                        <span class="label-success label label-default">Updated</span>
                                        @else
                                        <span class="label-danger label label-default">Not Updated</span>
                                    @endif
                                </td>
                                <td>
                                    @if($book->image)
                                        <i class=" glyphicon glyphicon-camera"></i>
                                    @endif
                                    @if($book->description)
                                        <i class ="glyphicon glyphicon-book"></i>
                                    @endif
                                </td>
                                <td class="center">
                                    <a class="btn" >
                                        <form action="{{url('')}}/admin/book/updateAmazon/{{$book->isbn}}" method="POST">
                                            <input type="hidden" name="_method" value="GET">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-success" value="Load From Amazon">
                                        </form>
                                    </a>
                                </td>

                                <td class="center">
                                    <a class="btn">
                                        <form action="{{url('')}}/admin/book/{{$book->id}}/edit" method="POST">
                                            <input type="hidden" name="_method" value="GET">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-info" value="Edit">
                                        </form>
                                    </a>
                                </td>

                                <td class="center">
                                    <a class="btn">

                                        <form action="{{url('')}}/admin/book/{{$book->id}}" method="POST">
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