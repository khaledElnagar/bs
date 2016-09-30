@extends('layouts.app')
@section('content')

        <!-- BEGIN: MAIN CONTAINER -->
<div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix" style="margin-top:50px;margin-bottom:50px;">
    <div class="main clearfix">
        <div id="jm-mainbody" class="clearfix">
            <!-- BEGIN: CONTENT -->
            <div id="jm-main">
                <div class="inner minner clearfix">
                    <!-- global messages -->
                    <!-- // global messages -->
                    <div id="jm-current-content" class="clearfix">
                        <!-- MASS Head -->
                        <!-- primary content -->
                        <div class="page-title">
                            <h1>Checkout</h1>
                        </div>
                        <ol class="opc" id="checkoutSteps">
                            <li id="opc-billing" class="section allow active">
                                <div class="step-title">
                                    <span class="number">1</span>

                                    <h2>Billing Information</h2>
                                    <a href="http://bookshop.demo.ubertheme.com/checkout/onepage/#">Edit</a>
                                </div>
                                <div id="checkout-step-billing" class="step a-item">
                                    <form id=""
                                          action="{{url('')}}/checkout" method="post">
                                        {{csrf_field()}}
                                        <fieldset>
                                            <ul class="form-list">
                                                <li id="billing-new-address-form">
                                                    <fieldset class="">
                                                        <input type="hidden" name="billing[address_id]" value="121"
                                                               id="billing:address_id">
                                                        <ul>
                                                            <li class="fields">
                                                                <div class="customer-name">
                                                                    <div class="field name-firstname">
                                                                        <label for="billing:firstname"
                                                                               class="required"><em>*</em>Name</label>

                                                                        <div class="input-box">
                                                                            <input type="text"
                                                                                   id="billing:firstname"
                                                                                   name="name"
                                                                                   value="{{auth()->user()->name}}" title="Name"
                                                                                   maxlength="255"
                                                                                   class="input-text required-entry">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="">
                                                                <label for="billing:street1"
                                                                       class="required"><em>*</em>Address</label>

                                                                <div class="input-box">
                                                                    <input type="text" title="Street Address"
                                                                           name="address"
                                                                           id="billing:street1" value="{{auth()->user()->address}}"
                                                                           class="input-text  required-entry">
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

                                                            <li class="fields">
                                                                <div class="field">
                                                                    <label for="billing:postcode"
                                                                           class="required"><em>*</em>Zip/Postal
                                                                        Code</label>

                                                                    <div class="input-box">
                                                                        <input type="text" title="Zip/Postal Code"
                                                                               name="postcode"
                                                                               id="billing:postcode" value=""
                                                                               class="input-text validate-zip-international  required-entry">
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="fields">
                                                                <div class="field">
                                                                    <label for="billing:telephone" class="required"><em>*</em>phone</label>

                                                                    <div class="input-box">
                                                                        <input type="text" name="phone"
                                                                               value="{{auth()->user()->phone}}" title="Telephone"
                                                                               class="input-text  required-entry"
                                                                               id="billing:telephone">
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
                                                    </fieldset>
                                                </li>

                                            </ul>
                                            <div class="buttons-set" id="billing-buttons-container">
                                                <p class="required">* Required Fields</p>
                                                <button type="submit" title="Continue" class="button"
                                                        ><span><span>Continue</span></span>
                                                </button>

                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: MAIN CONTAINER -->


@endsection
