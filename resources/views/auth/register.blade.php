@extends('layouts.app')

@section('content')
    <div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix" style="margin-top: 40px;">
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
                            <div class="account-create">
                                <div class="page-title">
                                    <h1>Create an Account</h1>
                                </div>
                                <form role="form" id="form-validate" method="POST" action="{{ url('/register') }}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="fieldset">
                                        <h2 class="legend">Personal Information</h2>
                                        <ul class="form-list">
                                            <li class="fields">
                                                <div class="customer-name">
                                                    <div class="field name-firstname">
                                                        <label for="name" class="required"><em>*</em>Name</label>

                                                        <div class="input-box">
                                                            <input type="text" id="name" name="name"
                                                                   value="{{old('name')}}"
                                                                   title="Name" maxlength="255"
                                                                   class="input-text required-entry {{ $errors->has('name') ? ' validation-failed' : '' }}">

                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('name') }}</div>
                                                            </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="customer-name">
                                                    <div class="field name-firstname">
                                                        <label for="age" class="required"><em>*</em>Age</label>

                                                        <div class="input-box">
                                                            <input type="text" id="age" name="age"
                                                                   value="{{old('age')}}"
                                                                   title="age" maxlength="255"
                                                                   class="input-text required-entry {{ $errors->has('age') ? ' validation-failed' : '' }}">

                                                            @if ($errors->has('age'))
                                                                <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('age') }}</div>
                                                            </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <label for="address" class="required"><em>*</em>Address</label>

                                                <div class="input-box">
                                                    <input type="text" name="address" id="address"
                                                           value="{{old('address')}}"
                                                           title="Address"
                                                           class="input-text required-entry {{ $errors->has('address') ? ' validation-failed' : '' }}">
                                                    @if ($errors->has('address'))
                                                        <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('address') }}</div>
                                                            </span>
                                                    @endif

                                                </div>
                                            </li>


                                            <li class="fields">
                                                <div class="country">
                                                    <div class="field country">

                                                        <label for="country" class="required"><em>*</em>Country</label>

                                                        <div class="input-box">
                                                            <select id="country" name="country"
                                                                    onchange="setState(this.value)"
                                                                    class="input-text required-entry {{ $errors->has('country') ? ' validation-failed' : '' }}">
                                                                <option value="">{{trans('Select Country')}}</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('country'))
                                                                <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('country') }}</div>
                                                            </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="city">
                                                    <div class="field city">

                                                        <label for="city" class="required"><em>*</em>City</label>

                                                        <div class="input">

                                                     <span class="input-box" id="stateContainer">
                                                        <select id="city" name="city"
                                                                class="input-text required-entry {{ $errors->has('city') ? ' validation-failed' : '' }}">
                                                            <option value="">Select City</option>
                                                            <option value=""></option>
                                                        </select>
                                                    </span>

                                                            @if ($errors->has('city'))
                                                                <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('city') }}</div>
                                                            </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </li>

                                            <li>
                                                <label for="phone" class="required"><em>*</em>Phone</label>

                                                <div class="input-box">
                                                    <input type="text" name="phone" id="phone" value="{{old('phone')}}"
                                                           title="phone"
                                                           class="input-text required-entry {{ $errors->has('phone') ? ' validation-failed' : '' }}">
                                                    @if ($errors->has('phone'))
                                                        <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('phone') }}</div>
                                                            </span>
                                                    @endif

                                                </div>
                                            </li>

                                            <li>
                                                <label for="university_flag">Sign Up As University</label>

                                                <div class="input-box">
                                                    <input type="checkbox" name="university_flag"
                                                           title="Sign Up As University " value="1"
                                                           id="university_flag">
                                                </div>
                                            </li>
                                            <li>
                                                <label for="image" class=""><em></em>University Logo</label>

                                                <div class="input-box">
                                                    <input type="file" name="image" id="image" value="{{old('image')}}"
                                                           title="image"
                                                           class="input-text {{ $errors->has('image') ? ' validation-failed' : '' }}">
                                                    @if ($errors->has('image'))
                                                        <span class="help-block">
                                                                 <div class="validation-advice"
                                                                 >{{ $errors->first('image') }}</div>
                                                            </span>
                                                    @endif

                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="fieldset">
                                        <h2 class="legend">Login Information</h2>
                                        <ul class="form-list">
                                            <li>
                                                <label for="email" class="required"><em>*</em>Email
                                                    Address</label>

                                                <div class="input-box">
                                                    <input type="text" name="email" id="email" value="{{old('email')}}"
                                                           title="Email Address"
                                                           value="{{ old('email') }}"
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
                                                                   title="Password"
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

                                            <li>
                                                <div class="captcha">
                                                    <div class="field captcha">

                                                        <label for="captcha" class="required"><em>*</em>{!! captcha_img()  !!}</label>

                                                        <div class="input-box">
                                                            <input type="text" name="captcha" class="input-text required-entry">
                                                            @if ($errors->has('captcha'))
                                                                <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-captcha">{{ $errors->first('captcha') }}</div>
                                                            </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </li>

                                        </ul>


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
                                    </div>
                                    <div class="buttons-set">
                                        <p class="required">* Required Fields</p>

                                        <p class="back-link"><a
                                                    href="{{url('')}}/login"
                                                    class="back-link">
                                                <small>«</small>
                                                Back</a></p>
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
                            </div>
                            <!-- // primary content -->
                        </div>
                    </div>
                </div>
                <!-- END: CONTENT -->
            </div>
        </div>
    </div>

@endsection
