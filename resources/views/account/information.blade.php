@extends('layouts.app')
@section('content')
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
                                            <h1>EDIT ACCOUNT INFORMATION</h1>
                                        </div>
                                        <form role="form" method="POST"
                                              action="{{ url('/account') }}/{{auth()->user()->id}}" autocomplete="off">
                                            <input type="hidden" name="_method" value="PUT">
                                            {{ csrf_field() }}

                                            <div class="fieldset">
                                                <h2 class="legend">Personal Information</h2>
                                                <ul class="form-list">
                                                    <li class="fields">
                                                        <div class="customer-name">
                                                            <div class="field name-firstname">
                                                                <label for="name"
                                                                       class="required"><em>*</em>Name</label>

                                                                <div class="input-box">
                                                                    <input type="text" id="name" name="name"
                                                                           value="{{old('name',auth()->user()->name)}}"
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
                                                        <label for="email" class="required"><em>*</em>Email
                                                            Address</label>

                                                        <div class="input-box">
                                                            <input type="text" name="email" id="email"
                                                                   title="Email Address"
                                                                   value="{{ old('email',auth()->user()->email) }}"
                                                                   class="input-text validate-email required-entry {{ $errors->has('email') ? ' validation-failed' : '' }}">
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                 <div class="validation-advice"
                                                                      id="advice-required-entry-firstname">{{ $errors->first('email') }}</div>
                                                            </span>
                                                            @endif

                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="customer-name">
                                                            <div class="field name-firstname">
                                                                <label for="age" class="required"><em>*</em>Age</label>

                                                                <div class="input-box">
                                                                    <input type="text" id="age" name="age"
                                                                           value="{{old('age',auth()->user()->age)}}"
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
                                                                   value="{{old('address',auth()->user()->address)}}"
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
                                                                            <option value="{{$country->id}}"
                                                                                    @if(auth()->user()->country== $country->id) selected @endif>{{$country->name}}</option>
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

                                                                <label for="city"
                                                                       class="required"><em>*</em>City</label>

                                                                <div class="input">

                                                     <span class="input-box" id="stateContainer">
                                                        <select id="city" name="city"
                                                                class="input-text required-entry {{ $errors->has('city') ? ' validation-failed' : '' }}">
                                                            <option value="">Select City</option>
                                                            @foreach($states as $state)
                                                                <option value="{{$state->id}}"
                                                                        @if(auth()->user()->city== $state->id) selected @endif>{{$state->name}}</option>
                                                            @endforeach
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
                                                            <input type="text" name="phone" id="phone"
                                                                   value="{{old('phone',auth()->user()->phone)}}"
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


                                                </ul>
                                            </div>
                                            <div class="fieldset">
                                                <h2 class="legend">Change Password</h2>
                                                <p>* If you don't want to change your password please leave this section empty .</p>
                                                <ul class="form-list">
                                                    <li>
                                                        <label for="current_password" class="required"><em>*</em>Current
                                                            Password</label>

                                                        <div class="input-box">
                                                            <!-- This is a dummy hidden field to trick firefox from auto filling the password -->
                                                            <input type="text" class="input-text no-display"
                                                                   name="dummy"
                                                                   id="dummy">
                                                            <input type="password" title="Current Password"
                                                                   class="input-text"
                                                                   name="current_password" id="current_password">
                                                        </div>
                                                    </li>
                                                    <li class="fields">
                                                        <div class="field">
                                                            <label for="password" class="required"><em>*</em>New
                                                                Password</label>

                                                            <div class="input-box">
                                                                <input type="password" title="New Password"
                                                                       class="input-text validate-password"
                                                                       name="password"
                                                                       id="password">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="fields">
                                                        <div class="field">
                                                            <label for="confirmation" class="required"><em>*</em>Confirm
                                                                New
                                                                Password</label>

                                                            <div class="input-box">
                                                                <input type="password" title="Confirm New Password"
                                                                       class="input-text validate-cpassword"
                                                                       name="password_confirmation"
                                                                       id="confirmation">
                                                            </div>
                                                        </div>

                                                    </li>
                                                </ul>

                                            </div>
                                            <div class="buttons-set">
                                                <p class="required">* Required Fields</p>

                                                <button type="submit" title="Save" class="button">
                                                    <span><span>Save</span></span>
                                                </button>
                                            </div>
                                        </form>

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
