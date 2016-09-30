<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Free HTML5 Bootstrap Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="{{asset('')}}css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="{{asset('')}}css/charisma-app.css" rel="stylesheet">
    <link href='{{asset('')}}bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='{{asset('')}}bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='{{asset('')}}bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='{{asset('')}}bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='{{asset('')}}bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='{{asset('')}}bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='{{asset('')}}css/jquery.noty.css' rel='stylesheet'>
    <link href='{{asset('')}}css/noty_theme_default.css' rel='stylesheet'>
    <link href='{{asset('')}}css/elfinder.min.css' rel='stylesheet'>
    <link href='{{asset('')}}css/elfinder.theme.css' rel='stylesheet'>
    <link href='{{asset('')}}css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='{{asset('')}}css/uploadify.css' rel='stylesheet'>
    <link href='{{asset('')}}css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="{{asset('')}}bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{asset('')}}img/favicon.ico">

</head>

<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{asset('')}}index.html"> <img alt="Charisma Logo"
                                                                     src="{{asset('')}}img/logo20.png"
                                                                     class="hidden-xs"/>
            <span>Charisma</span></a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{url('')}}/admin/logout">Logout</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->
    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="{{url('')}}/admin">
                                <i class="glyphicon glyphicon-home"></i>
                                <span> Dashboard</span>
                            </a>
                        </li>

                        <li class="accordion">
                            <a href="{{url('')}}/#"><i class="glyphicon glyphicon-book"></i><span> Books</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url('')}}/admin/category">Categories</a></li>
                                <li><a href="{{url('')}}/admin/book">Books</a></li>
                            </ul>
                        </li>


                        <li><a class="ajax-link" href="{{url('')}}/admin/contact"><i
                                        class=" glyphicon glyphicon-eye-close"></i><span> Contact Info</span></a>
                        </li>

                        <li><a class="ajax-link" href="{{url('')}}/admin/order"><i
                                        class=" glyphicon glyphicon-shopping-cart"></i><span> Orders </span></a>
                        </li>

                        <li><a class="ajax-link" href="{{url('')}}/admin/wish"><i
                                        class=" glyphicon glyphicon-shopping-cart"></i><span> Wish List </span></a>
                        </li>

                        <li>
                            <a class="ajax-link" href="{{url('')}}/admin/user"><i
                                        class="glyphicon glyphicon-user"></i><span> Clients</span></a>
                        </li>

                        <li>
                            <a class="ajax-link" href="{{url('')}}/admin/university"><i
                                        class=" glyphicon glyphicon-briefcase"></i><span> University</span></a>
                        </li>


                        <li><a class="ajax-link" href="{{url('')}}/admin/message"><i
                                        class=" glyphicon glyphicon-envelope"></i><span> Messages</span></a>
                        </li>

                        <li class="accordion">
                            <a href="{{url('')}}/#"><i class="glyphicon glyphicon-bullhorn"></i><span> News</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url('')}}/admin/new">All News</a></li>
                                <li><a href="{{url('')}}/admin/new/create">Create a new</a></li>
                            </ul>
                        </li>

                        <li class="accordion">
                            <a href="{{url('')}}/#"><i class=" glyphicon glyphicon-file"></i><span> Pages</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url('')}}/admin/page">All Pages</a></li>
                                <li><a href="{{url('')}}/admin/page/create">Create a page</a></li>
                            </ul>
                        </li>

                        <li class="accordion">
                            <a href="{{url('')}}/#"><i class="glyphicon glyphicon-camera"></i><span> Slider</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url('')}}/admin/slide">All Slides</a></li>
                                <li><a href="{{url('')}}/admin/slide/create">Create a slider</a></li>
                            </ul>
                        </li>



                        <li class="nav-header hidden-md">Sample Section</li>
                        <li><a class="ajax-link" href="{{url('')}}/table.html"><i
                                        class="glyphicon glyphicon-align-justify"></i><span> Tables</span></a></li>
                        <li class="accordion">
                            <a href="{{url('')}}/#"><i class="glyphicon glyphicon-plus"></i><span> Accordion Menu</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{url('')}}/#">Child Menu 1</a></li>
                                <li><a href="{{url('')}}/#">Child Menu 2</a></li>
                            </ul>
                        </li>
                        <li><a class="ajax-link" href="{{url('')}}/calendar.html"><i
                                        class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>
                        <li><a class="ajax-link" href="{{url('')}}/grid.html"><i
                                        class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="{{url('')}}/tour.html"><i class="glyphicon glyphicon-globe"></i><span> Tour</span></a>
                        </li>
                        <li><a class="ajax-link" href="{{url('')}}/icon.html"><i
                                        class="glyphicon glyphicon-star"></i><span> Icons</span></a></li>
                        <li><a href="{{url('')}}/error.html"><i class="glyphicon glyphicon-ban-circle"></i><span> Error Page</span></a>
                        </li>
                        <li><a href="{{url('')}}/login.html"><i
                                        class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                        </li>
                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->


        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="{{url('')}}/http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>

                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ session('error') }}</li>
                        </ul>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <ul class="breadcrumb">
                    @yield('fast-nav')
                </ul>
            </div>

            @yield('content')

            <footer class="row">
                <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://www.td.com.eg" target="_blank">Typical
                        Design</a> 2016</p>

                <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                            href="http://www.td.com.eg">Typical Design</a></p>
            </footer>

        </div><!--/.fluid-container-->

        <!-- external javascript -->

        <script src="{{asset('')}}bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- library for cookie management -->
        <script src="{{asset('')}}js/jquery.cookie.js"></script>
        <!-- calender plugin -->
        <script src='{{asset('')}}bower_components/moment/min/moment.min.js'></script>
        <script src='{{asset('')}}bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
        <!-- data table plugin -->
        <script src='{{asset('')}}js/jquery.dataTables.min.js'></script>

        <!-- select or dropdown enhancer -->
        <script src="{{asset('')}}bower_components/chosen/chosen.jquery.min.js"></script>
        <!-- plugin for gallery image view -->
        <script src="{{asset('')}}bower_components/colorbox/jquery.colorbox-min.js"></script>
        <!-- notification plugin -->
        <script src="{{asset('')}}js/jquery.noty.js"></script>
        <!-- library for making tables responsive -->
        <script src="{{asset('')}}bower_components/responsive-tables/responsive-tables.js"></script>
        <!-- tour plugin -->
        <script src="{{asset('')}}bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
        <!-- star rating plugin -->
        <script src="{{asset('')}}js/jquery.raty.min.js"></script>
        <!-- for iOS style toggle switch -->
        <script src="{{asset('')}}js/jquery.iphone.toggle.js"></script>
        <!-- autogrowing textarea plugin -->
        <script src="{{asset('')}}js/jquery.autogrow-textarea.js"></script>
        <!-- multiple file upload plugin -->
        <script src="{{asset('')}}js/jquery.uploadify-3.1.min.js"></script>
        <!-- history.js for cross-browser state change on ajax -->
        <script src="{{asset('')}}js/jquery.history.js"></script>
        <!-- application script for Charisma demo -->
        <script src="{{asset('')}}js/charisma.js"></script>

        <script src="{{asset('')}}css/laravel-ckeditor/ckeditor.js"></script>
        <script src="{{asset('')}}css/laravel-ckeditor/adapters/jquery.js"></script>
        <script>
            $('textarea').ckeditor();
            // $('.textarea').ckeditor(); // if class is prefered.
        </script>

</body>
</html>
