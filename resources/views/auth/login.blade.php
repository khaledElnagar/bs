@extends('layouts.app')

@section('content')

    <div id="jm-wrapper" style="margin-top: 50px;">
        <!-- BEGIN: MAIN CONTAINER -->
        <div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix">
            <div class="main clearfix">
                <div id="jm-mainbody" class="clearfix">
                    <!-- BEGIN: CONTENT -->
                    <div id="jm-main">
                        <div class="inner clearfix">


                                        <!-- // global messages -->
                                <!-- MASS Head -->
                                <div id="jm-current-content" class="clearfix">
                                    <!-- primary content -->
                                    <div class="account-login">
                                        <div class="page-title">
                                            <h1>Login or Create an Account</h1>
                                        </div>

                                        <form role="form" method="POST" action="{{ url('/login') }}">
                                            {{ csrf_field() }}

                                            <div class="col2-set">
                                                <div class="col-1 new-users">
                                                    <div class="content">
                                                        <h2>New Customers</h2>

                                                        <p>By creating an account with our store, you will be able to
                                                            move
                                                            through the checkout process faster, store multiple shipping
                                                            addresses, view and track your orders in your account and
                                                            more.</p>
                                                    </div>
                                                    <div class="buttons-set">
                                                        <button type="button" title="Create an Account" class="button"
                                                                onclick="window.location='{{url('')}}/register';">
                                                            <span><span>Create an Account</span></span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-2 registered-users">
                                                    <div class="content">
                                                        <h2>Registered Customers</h2>

                                                        <p>If you have an account with us, please log in.</p>

                                                        <ul class="form-list">
                                                            <li>
                                                                <label for="email" class="required"><em>*</em>Email
                                                                    Address</label>

                                                                <div class="input-box">

                                                                    <input type="email"
                                                                           class="input-text required-entry validate-email"
                                                                           name="email" value="{{ old('email') }}">

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <label for="pass"
                                                                       class="required"><em>*</em>Password</label>

                                                                <div class="input-box">
                                                                    <input type="password"
                                                                           class="input-text required-entry validate-password"
                                                                           name="password">

                                                                </div>
                                                            </li>
                                                        </ul>
                                        </form>
                                        <div id="window-overlay" class="window-overlay"
                                             style="display:none;"></div>
                                        <div id="remember-me-popup" class="remember-me-popup"
                                             style="display:none;">
                                            <div class="remember-me-popup-head">
                                                <h3>What's this?</h3>
                                                <a href="#" class="remember-me-popup-close"
                                                   title="Close">Close</a>
                                            </div>
                                            <div class="remember-me-popup-body">
                                                <p>Checking &quot;Remember Me&quot; will let you access your
                                                    shopping cart on this computer when you are logged out</p>

                                                <div class="remember-me-popup-close-button a-right">
                                                    <a href="#" class="remember-me-popup-close button"
                                                       title="Close"><span>Close</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            function toggleRememberMepopup(event) {
                                                if ($('remember-me-popup')) {
                                                    var viewportHeight = document.viewport.getHeight(),
                                                            docHeight = $$('body')[0].getHeight(),
                                                            height = docHeight > viewportHeight ? docHeight : viewportHeight;
                                                    $('remember-me-popup').toggle();
                                                    $('window-overlay').setStyle({height: height + 'px'}).toggle();
                                                }
                                                Event.stop(event);
                                            }

                                            document.observe("dom:loaded", function () {
                                                new Insertion.Bottom($$('body')[0], $('window-overlay'));
                                                new Insertion.Bottom($$('body')[0], $('remember-me-popup'));

                                                $$('.remember-me-popup-close').each(function (element) {
                                                    Event.observe(element, 'click', toggleRememberMepopup);
                                                })
                                                $$('#remember-me-box a').each(function (element) {
                                                    Event.observe(element, 'click', toggleRememberMepopup);
                                                });
                                            });
                                            //]]>
                                        </script>
                                        <p class="required">* Required Fields</p>
                                    </div>
                                    <div class="buttons-set">
                                        <a href="{{url('')}}/password/reset" class="f-left">Forgot Your
                                            Password?</a>
                                        <button type="submit" class="button" title="Login" name="send"
                                                id="send2"><span><span>Login</span></span></button>
                                    </div>
                                </div>
                        </div>
                        </form>
                        <script type="text/javascript">
                            //<![CDATA[
                            var dataForm = new VarienForm('login-form', true);
                            //]]>
                        </script>
                    </div>
                    <!-- // primary content -->
                </div>
            </div>
        </div>
        <!-- END: CONTENT -->
    </div>
    </div>
    </div>
    <!-- END: MAIN CONTAINER -->
    <!-- //BOTTOM SPOTLIGHT -->
    <!-- //BOTTOM SPOTLIGHT -->
    <!-- BOTTOM SPOTLIGHT -->
    </div>



@endsection
