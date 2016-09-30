@extends('layouts.app')
@section('content')

    <div id="jm-wrapper">
        <!-- BEGIN: MAIN CONTAINER -->
        <div id="jm-container" class="jm-lo-2colsl jm-col-left not-breadcrumbs wrap clearfix">
            <div class="main clearfix" style="margin-top: 50px;margin-bottom:50px;">
                <div id="jm-mainbody" class="clearfix">
                    <!-- BEGIN: CONTENT -->
                    <div id="jm-main">
                        <div class="inner minner clearfix">
                            <div id="jm-current-content" class="clearfix">
                                <!-- //TOP SPOTLIGHT 3 -->
                                <!-- //TOP SPOTLIGHT 3 -->
                                <!-- //TOP SPOTLIGHT 3 -->
                                <!-- //TOP SPOTLIGHT 3 -->
                                <!-- MASS Head -->
                                <!-- primary content -->
                                <div class="my-account">
                                    <div class="dashboard">
                                        <div class="page-title">
                                            <h1>My Dashboard</h1>
                                        </div>
                                        <div class="welcome-msg">
                                            <p class="hello"><strong>Hello, {{auth()->user()->name}} !</strong></p>

                                            <p>From your <strong>My Account Dashboard</strong> you have the ability to view a snapshot of
                                                your recent account activity and update your account information. Select
                                                a
                                                link below to view or edit information.</p>
                                        </div>
                                        <div class="box-account box-info">
                                            <div class="box-head">
                                                <h2>Account Information</h2>
                                            </div>
                                            <div class="col2">
                                                <div class="col-1">
                                                    <div class="box">
                                                        <div class="box-title">
                                                            <h3>Contact Information</h3>
                                                            <a href="{{url('')}}/account/information">Edit</a>
                                                        </div>
                                                        <div class="box-content">
                                                            <p>
                                                                {{auth()->user()->name}}<br>
                                                                {{auth()->user()->email}}<br>
                                                                <a href="{{url('')}}/account/information">Change
                                                                    Password</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            <!-- // primary content -->
                            </div>
                        </div>
                    </div>
                    <!-- END: CONTENT -->
                    <!-- BEGIN: COLUMN 1 -->
                    @include('account.menu')
                    <!-- END: COLUMN 1 -->
                </div>
            </div>
        </div>
        <!-- END: MAIN CONTAINER -->
    </div>
@endsection
