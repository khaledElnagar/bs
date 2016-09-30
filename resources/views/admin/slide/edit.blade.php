@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/slide">Slides</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/slide/{{$slide->id}}">Edit A Slide</a>
    </li>
@endsection
@section('content')


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Update Slide</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form action="{{url('')}}/admin/slide/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$slide->title}}"
                                   placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label for="description">Details</label>
                            <textarea class="form-control" id="description" name="description"placeholder="Enter Description">{{$slide->description}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="title">Link</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{$slide->link}}"
                                   placeholder="Enter Link">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>


                        <ul class="thumbnails gallery">
                            <li id="image-1" class="thumbnail">
                                <a style="background:url({{asset('')}}images/slides/{{$slide->image}})"
                                   title="Sample Image 1"
                                   href="{{asset('')}}images/slides/{{$slide->image}}"
                                   class="cboxElement"><img class="grayscale"
                                                            src="{{asset('')}}images\slides\{{$slide->image}}"
                                                            alt="Sample Image 1" style="display: block;"></a>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

@endsection