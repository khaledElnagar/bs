@extends('admin.layouts.master')
@section('content')

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Form Elements</h2>

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
                    <form action="{{url('')}}/admin/{{$admin->id}}" method="POST">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="username">UserName</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter UserName"
                                   value={{$admin->user_name}} name="user_name">

                        </div>

                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                   value={{$admin->email}}>

                        </div>

                        <div class="form-group">
                            <label for="password">Old Password</label>
                            <input type="password" class="form-control" id="password"
                                   placeholder="Old Password" name ="old_password">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" id="password"
                                   placeholder="New Password" name ="password">
                        </div>

                        <div class="form-group">
                            <label for="password">New Password Confirmation</label>
                            <input type="password" class="form-control" id="password"
                                   placeholder="New Password Confirmation" name ="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!--/span-->

    </div>

@endsection