@extends('layouts.app')

        <!-- Main Content -->
@section('content')
    <div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix" style="margin-top: 50px; margin-bottom: 10px;">
        @if ($errors->has('email'))
            <div id="jm-messages" class="wrap clearfix">
                <div class="main clearfix">
                    <div class="inner clearfix">
                        <ul class="messages">
                            <li class="error-msg">
                                <ul>
                                    <li>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
            @if (session('status'))
                <div id="jm-messages" class="wrap clearfix">
                    <div class="main clearfix">
                        <div class="inner clearfix">
                            <ul class="messages">
                                <li class="success-msg">
                                    <ul>
                                        <li>
                                            <strong>{{ session('status') }}</strong>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

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
                                    <h1>Forgot Your Password?</h1>
                                </div>
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ url('/password/email') }}">
                                    {{ csrf_field() }}

                                    <div class="fieldset">
                                        <h2 class="legend">Retrieve your password here</h2>

                                        <p>Please enter your email address below. You will receive a link to reset your
                                            password.</p>
                                        <ul class="form-list">
                                            <li>
                                                <label for="email" class="required"><em>*</em>Email
                                                    Address</label>

                                                <div class="input-box">
                                                    <input type="text" name="email" alt="email" id="email"
                                                           class="input-text required-entry validate-email"
                                                           value="{{ old('email') }}">

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="buttons-set">
                                        <p class="required">* Required Fields</p>

                                        <p class="back-link"><a
                                                    href="http://bookshop.demo.ubertheme.com/customer/account/login/">
                                                <small>«</small>
                                                Back to Login</a></p>
                                        <button type="submit" title="Submit" class="button">
                                            <span><span>Submit</span></span>
                                        </button>
                                    </div>


                                </form>

                                <script type="text/javascript">
                                    //<![CDATA[
                                    var dataForm = new VarienForm('form-validate', true);
                                    //]]>
                                </script>
                                <!-- // primary content -->
                            </div>
                    </div>
                </div>
                <!-- END: CONTENT -->
            </div>
        </div>
    </div>

@endsection
