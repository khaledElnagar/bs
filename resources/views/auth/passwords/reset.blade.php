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
                                <h1>Reset Password</h1>
                            </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="fieldset">
                                    <h2 class="legend">Login Information</h2>
                                    <ul class="form-list">
                                        <li>
                                            <label for="email" class="required"><em>*</em>Email
                                                Address</label>

                                            <div class="input-box">
                                                <input type="text" name="email" id="email" value="{{ $email or old('email') }}"
                                                       title="Email Address"
                                                       class="input-text validate-email required-entry {{ $errors->has('email') ? ' validation-failed' : '' }}">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('email') }}</div>
                                                            </span>
                                                @endif

                                            </div>
                                        </li>

                                        <li class="fields">
                                            <div class="password">
                                                <div class="field password">

                                                    <label for="password" class="required"><em>*</em>Password
                                                    </label>

                                                    <div class="input-box">
                                                        <input type="password" name="password" id="password"
                                                               value=""
                                                               title="password"
                                                               class="input-text required-entry {{ $errors->has('password') ? ' validation-failed' : '' }}">
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('password') }}</div>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="password">
                                                <div class="field password-confirmation">

                                                    <label for="password_confirmation" class="required"><em>*</em>Confirm
                                                        Password</label>

                                                    <div class="input-box">
                                                        <input type="password" name="password_confirmation"
                                                               id="password_confirmation" value=""
                                                               title="Confirm Password"
                                                               class="input-text required-entry {{ $errors->has('password_confirmation') ? ' validation-failed' : '' }}">
                                                        @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('password_confirmation') }}</div>
                                                            </span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                        </li>

                                </div>
                                <div class="buttons-set">
                                    <p class="required">* Required Fields</p>

                                    <p class="back-link"><a
                                                href="http://bookshop.demo.ubertheme.com/customer/account/login/">
                                            <small>«</small>
                                            Back to Login</a></p>
                                    <button type="submit" title="Submit" class="button">
                                        <span><span>Reset Password</span></span>
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
