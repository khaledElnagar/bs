<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book Store Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Typica Design">

    <!-- The styles -->
    <link id="bs-css" href="{{asset('')}}/css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="{{asset('')}}/css/charisma-app.css" rel="stylesheet">
    <link href='{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='{{asset('')}}/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='{{asset('')}}/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='{{asset('')}}/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='{{asset('')}}/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/jquery.noty.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/noty_theme_default.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/elfinder.min.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/elfinder.theme.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/uploadify.css' rel='stylesheet'>
    <link href='{{asset('')}}/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="{{asset('')}}/bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="{{asset('')}}/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="{{asset('')}}/img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Welcome to Book Store</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    @yield('content')

</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{asset('')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="{{asset('')}}/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='{{asset('')}}/bower_components/moment/min/moment.min.js'></script>
<script src='{{asset('')}}/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='{{asset('')}}/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="{{asset('')}}/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="{{asset('')}}/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="{{asset('')}}/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="{{asset('')}}/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="{{asset('')}}/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="{{asset('')}}/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="{{asset('')}}/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="{{asset('')}}/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="{{asset('')}}/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{asset('')}}/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="{{asset('')}}/js/charisma.js"></script>


</body>
</html>
