@extends('layouts.app')
@section('content')
    <div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix" style="margin: 50px 0 50px 0">
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
                            <div id="messages_product_view"></div>
                            <div class="page-title">
                                <h1>Contact Us</h1>
                            </div>
                            <div class="jm-contacts">
                                <div class="contact-info">
                                    <div class="inner">
                                        <div id="googleMap" style="width: 100%;height: 452px;"></div>
                                        <script
                                                src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
                                        </script>
                                        <script>
                                            var myCenter = new google.maps.LatLng({{$contact->latitude}}, {{$contact->longitude}});


                                            function initialize() {
                                                var mapProp = {
                                                    center: myCenter,
                                                    zoom: 17,
                                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                                };

                                                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                                                var marker = new google.maps.Marker({
                                                    position: myCenter,
                                                });

                                                marker.setMap(map);


                                                var infowindow = new google.maps.InfoWindow({
                                                    content: "<div id='mapBox' style='direction:ltr'><strong style='    margin-left: 22px;'> Address  </strong><br/>{{$contact->address}} </div>"

                                                });


                                                infowindow.open(map, marker);

                                                google.maps.event.addListener(marker, 'click', function () {
                                                    infowindow.open(map, marker);
                                                });
                                            }

                                            google.maps.event.addDomListener(window, 'load', initialize);


                                        </script>

                                        <div class="info-inner">
                                            <p>
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                                accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
                                                illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                                                explicabo.
                                            </p>

                                            <div class="info-inner2">
                                                <ul class="list-info">
                                                    <li class="address"><em class="icon-home">
                                                        </em><span>Address:</span> {{$contact->address}}
                                                    </li>
                                                    <li class="phone"><em class="icon-phone">
                                                        </em><span>Phone:</span>{{$contact->phone}}
                                                    </li>
                                                    <li class="fax"><em class="icon-print">&nbsp;</em><span>Fax:</span>
                                                        {{$contact->fax}}
                                                    </li>
                                                    <li class="email"><em class="icon-envelope-alt">&nbsp;</em><span>Email:</span>
                                                        {{$contact->email}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{url('')}}/contactus" id="contactForm"
                                      method="POST">
                                    {{csrf_field()}}
                                    <div class="fieldset">
                                        <ul class="form-list">
                                            <li class="fields">
                                                <div class="field">
                                                    <label for="name" class="required"><em>*</em>Your Name</label>

                                                    <div class="input-box">
                                                        <input name="name" id="name" title="Name" value="{{old('name')}}"
                                                               class="input-text required-entry" type="text"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="field">
                                                    <label for="email" class="required"><em>*</em>Email</label>

                                                    <div class="input-box">
                                                        <input name="email" id="email" title="Email" value="{{old('email')}}"
                                                               class="input-text required-entry validate-email"
                                                               type="text"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="field">
                                                    <label for="telephone">Telephone</label>

                                                    <div class="input-box">
                                                        <input name="phone" id="telephone" title="Telephone"
                                                               value="{{old('phone')}}" class="input-text" type="text"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="wide">
                                                <label for="message" class="required"><em>*</em>Message</label>

                                                <div class="input-box">
                                                    <textarea name="message" id="message" title="Message"
                                                              class="required-entry input-text" cols="5"
                                                              rows="3">{{old('message')}}</textarea>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="buttons-set">
                                        <p class="required">* Required Fields</p>
                                        <button type="submit" title="Send Message" class="button"><span><span>Send Message</span></span>
                                        </button>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    //<![CDATA[
                                    var contactForm = new VarienForm('contactForm', true);
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
