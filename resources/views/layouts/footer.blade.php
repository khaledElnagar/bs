<!-- BOTTOM SPOTLIGHT -->
<div id="jm-bots1" class="jm-spotlight wrap clearfix">
    <div class="main col2-set clearfix">
        <div class="inner clearfix">
            <div class="block block-shipping">
                <div class="inner">
                    <div class="fb-page" data-href="https://www.facebook.com/typicaldesign" data-tabs="timeline"
                         data-width="260" data-height="400" data-small-header="false" data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/typicaldesign" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/typicaldesign">Typical design</a></blockquote>
                    </div>
                </div>
            </div>
            <div class="block-browser col-1 first">
                <div class="col-inner">
                    <div class="block-title"><strong><span>Browser</span></strong></div>
                    <div class="block-content">
                        <ul>
                            <li><a href="{{url('')}}/">Home</a></li>
                            <li><a href="{{url('')}}/category">Categories</a></li>
                            <li><a href="{{url('')}}/book">Special Books</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="block-information col-1 first">
                <div class="col-inner">
                    <div class="block-title"><strong><span>Information</span></strong></div>
                    <div class="block-content">
                        <ul>
                            <li><a href="{{url('')}}/aboutus">About Us</a></li>
                            <li><a href="{{url('')}}/privacy">Privacy Policy</a></li>
                            <li><a href="{{url('')}}/terms">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="block-my-account col-3">
                <div class="col-inner">
                    <div class="block-title"><strong><span>My account</span></strong></div>
                    <div class="block-content">
                        <ul>
                            <li><a href="{{url('')}}/login">Sign In</a></li>
                            <li><a href="{{url('')}}/cart">View Cart</a></li>
                            <li><a href="{{url('')}}/account/wishlist">My Wishlist</a></li>
                            <li><a href="{{url('')}}/contactus">Contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="block-location col-4 last">
                <div class="col-inner">
                    <div class="block-title"><strong><span>Location</span></strong></div>
                    <div class="block-content">
                        <p>Address: {{$contact->address}}.</p>

                        <p>Mail to: <a href="mailto:{{$contact->email}}"
                                       title="{{$contact->email}}">{{$contact->email}}</a>
                        </p>

                        <p>Phone: {{$contact->phone}}</p>

                        <p>Mobile: {{$contact->mobile}}</p>

                        <p>Fax: {{$contact->fax}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //BOTTOM SPOTLIGHT -->

<!-- BEGIN: FOOTER -->
<div id="jm-footer" class="wrap clearfix">
    <div class="main">
        <div class="inner clearfix">
            <div class="inner2 clearfix">
                <div class="jm-info clearfix">
                </div>
                <div class="jm-legal">
                    <script type="text/javascript">
                        //$('bug_tracking_link').target = "varien_external";
                    </script>
                    Powered by <a href="http://www.td.com.eg" title="Book Store"
                                  rel="nofollow">Book Store</a> - Designed by Typical Design
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: FOOTER -->
