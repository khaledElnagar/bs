@extends('layouts.app')
@section('content')
    <div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix" style="margin: 50px 0 50px 0">
        <div id="jm-container" class="jm-lo-1col wrap   clearfix">
            <div class="main clearfix">
                <div id="jm-mainbody" class="clearfix">
                    <!-- BEGIN: CONTENT -->
                    <div id="jm-main">
                        <div class="inner clearfix">
                            <!-- global messages -->

                            <!-- // global messages -->
                            <!-- MASS Head -->
                            <div id="jm-current-content" class="clearfix">
                                <!-- primary content -->
                                <div class="page-title">
                                    <h1>{{$privacy->title}}</h1>
                                </div>
                                <div class="std">
                                   {!!$privacy->details!!}
                                </div>                          <!-- // primary content -->
                            </div>
                        </div>
                    </div>
                    <!-- END: CONTENT -->
                </div>
            </div>
        </div>

    </div>

@endsection
