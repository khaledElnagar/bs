@extends('admin.layouts.master')

@section('fast-nav')
    <li>
        <a href="{{url('')}}/admin">Home</a>
    </li>
    <li>
        <a href="{{url('')}}/admin/contact">Contact-Us</a>
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> Contact Us Info </h2>


                </div>
                <div class="box-content">

                    <form action="{{url('')}}/admin/contact/{{$contact->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email </label>
                            <input required="required" type="text" name="email" value="{{$contact->email}}"
                                   class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number </label>
                            <input required="required" type="text" name="phone" value="{{$contact->phone}}"
                                   class="form-control" id="exampleInputEmail1" placeholder="Phone Number  ">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number </label>
                            <input required="required" type="text" name="mobile" value="{{$contact->mobile}}"
                                   class="form-control" id="exampleInputEmail1" placeholder="Mobile Number ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Fax </label>
                            <input required="required" type="text" name="fax" value="{{$contact->fax}}"
                                   class="form-control" id="exampleInputEmail1" placeholder="Fax ">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Address </label>
                            <textarea required="required" name="address"
                                      class="form-control">{{$contact->address}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Facebook Link</label>
                            <input type="url" name="facebook" value="{{$contact->facebook}}" class="form-control"
                                   id="exampleInputEmail1" placeholder="Facebook Link ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Twitter Link </label>
                            <input type="url" name="twitter" value="{{$contact->twitter}}" class="form-control"
                                   id="exampleInputEmail1" placeholder="Twitter Link  ">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Youtube Link </label>
                            <input type="url" name="youtube" value="{{$contact->youtube}}" class="form-control"
                                   id="exampleInputEmail1" placeholder="Youtube Link  ">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Linked-In</label>
                            <input type="url" name="linked_in" value="{{$contact->linked_in}}" class="form-control"
                                   id="exampleInputEmail1" placeholder="Linked-In">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Google Plus </label>
                            <input type="url" name="google_plus" value="{{$contact->google_plus}}"
                                   class="form-control"
                                   id="exampleInputEmail1" placeholder="Google Plus">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Wslny Link </label>
                            <input type="url" name="wslny" value="{{$contact->wslny}}" class="form-control"
                                   id="exampleInputEmail1" placeholder="Wslny Link">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Your Location on Map </label>


                            <script
                                    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
                            </script>

                            <script>
                                var myCenter = new google.maps.LatLng({{$contact->latitude}} , {{$contact->longitude}});


                                function initialize() {
                                    var mapProp = {
                                        center: myCenter,
                                        zoom: 7,
                                        panControl: true,
                                        zoomControl: true,
                                        mapTypeControl: true,
                                        scaleControl: true,
                                        streetViewControl: true,
                                        overviewMapControl: true,
                                        rotateControl: true,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };

                                    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

                                    var marker = new google.maps.Marker({
                                        position: myCenter,
                                    });

                                    marker.setMap(map);

                                    google.maps.event.addListener(map, 'click', function (event) {
                                        placeMarker(event.latLng);
                                    });
                                }

                                function placeMarker(location) {
                                    var marker = new google.maps.Marker({
                                        position: location,
                                        map: map,
                                        //  animation:google.maps.Animation.BOUNCE

                                    });

                                    google.maps.event.addListener(marker, 'click', function () {
                                        marker.setVisible(false); // maps API hide call
                                    });

                                    var infowindow = new google.maps.InfoWindow({
                                        content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
                                    });
                                    infowindow.open(map, marker);
                                    document.getElementById('latitude').value = location.lat();
                                    document.getElementById('longitude').value = location.lng();


                                }

                                google.maps.event.addDomListener(window, 'load', initialize);
                            </script>

                            <div id="googleMap" style="width:100%;height:500px;  margin-top: 20px;"></div>
                            <input type="hidden" id="latitude" name="latitude" value="{{$contact->latitude}}" size="50">
                            <input type="hidden" id="longitude" name="longitude" value="{{$contact->longitude}}" size="50">


                        </div>
                        <input type="hidden" name="Id" value="{{$contact->Id}}">
                        <button type="submit" class="btn btn-default">Edit</button>

                    </form>

                </div>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->


    <!-- content ends -->
    </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->

    <!-- Ad, you can remove it -->
    <div class="row">


    </div>
    <!-- Ad ends -->

    <hr>
@endsection
     

   

 

