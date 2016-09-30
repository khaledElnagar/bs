@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/university">Universities</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/university/{{$university->id}}">Edit University</a>
    </li>
@endsection
@section('content')


    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Update University</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                    class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form action="{{url('')}}/admin/university/{{$university->id}}" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Book Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$university->name}}"
                                   placeholder="Enter Book Name">
                        </div>

                        <div class="form-group">
                            <label for="discount">discount Value ( max 100 )</label>
                            <input type="number" class="form-control" id="discount" name="discount"
                                   value="{{$university->discount}}" min="0" max ="100">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="approved_university">Approve University</label>

                            <div class="controls">
                                <select id="approved_university" name="approved_university" data-rel="chosen" style="min-width:100px;">
                                    <option value="0" @if($university->approved_university ==0)selected @endif>No
                                    </option>
                                    <option value="1" @if($university->approved_university ==1)selected @endif>Yes
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>


                        <ul class="thumbnails gallery">
                            <li id="image-1" class="thumbnail">
                                <a style="background:url({{asset('storage/app/public/images/university')}}\{{$university->image}})"
                                   title="Sample Image 1"
                                   href="{{asset('storage/app/public/images/university')}}/{{$university->image}}"
                                   class="cboxElement"><img class="grayscale"
                                                            src="{{asset('storage/app/public/images/university')}}\{{$university->image}}"
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