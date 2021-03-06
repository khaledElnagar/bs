@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/page">Pages</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/page/create">Create A page</a>
    </li>
@endsection
@section('content')

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class=" glyphicon glyphicon-file"></i> Create Page</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form action="{{url('')}}/admin/page" method="POST">
                        <input type="hidden" name="_method" value="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="control-group">
                            <label class="control-label" for="selectError">Page Flag</label>

                            <div class="controls">
                                <select id="selectError" name="menu_flag" data-rel="chosen" style="min-width:300px;">
                                    <option value="1">About Page</option>
                                    <option value="2">Terms & Conditions</option>
                                    <option value="3">Privacy Policy</option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" id="details" name="details" id="summernote"
                                      placeholder="Enter Details"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

@endsection