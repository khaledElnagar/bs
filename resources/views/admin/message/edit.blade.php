@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/book">Books</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/book/{{$book->id}}">Edit Book</a>
    </li>
@endsection
@section('content')


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Update Book</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form action="{{url('')}}/admin/book/{{$book->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Book Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$book->name}}"
                                   placeholder="Enter Book Name">
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}"
                                   placeholder="Enter Author Name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"
                                      placeholder="Enter Description">{{$book->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$book->price}}"
                                   placeholder="Enter Price">
                        </div>

                        <div class="form-group">
                            <label for="year">Publish Year</label>
                            <input type="text" class="form-control" id="year" name="publish_year"
                                   value="{{$book->publish_year}}" placeholder="Enter Publish year">
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <ul class="thumbnails gallery">
                            <li id="image-1" class="thumbnail">
                                <a style="background:url({{asset('')}}images\{{$book->image}})"
                                   title="Sample Image 1"
                                   href="{{asset('')}}images/{{$book->image}}"
                                   class="cboxElement"><img class="grayscale"
                                                            src="{{asset('')}}images\{{$book->image}}"
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