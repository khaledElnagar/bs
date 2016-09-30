<div id="jm-col1" class="col-left side-col">
    <div class="inner linner clearfix">
        <div class="block block-account">
            <div class="block-title">
                <strong><span>My Account</span></strong>
            </div>
            <div class="block-content">
                <ul>

                    @if(Request::segment(2)=='dashboard')
                        <li class="current"><strong>Account Dashboard</strong></li>
                    @else
                        <li><a href="{{url('')}}/account/dashboard">Account Dashboard </a></li>
                    @endif



                    @if(Request::segment(2)=='information')
                        <li class="current"><strong>Account Information</strong></li>
                    @else
                        <li><a href="{{url('')}}/account/information">Account Information</a></li>
                    @endif


                    @if(Request::segment(2)=='orders')
                        <li class="current"><strong>My Orders</strong></li>
                    @else
                        <li><a href="{{url('')}}/account/orders">
                                My Orders </a></li>
                    @endif



                    @if(Request::segment(2)=='wishlist')
                        <li class="current"><strong>My Wishlist</strong></li>
                    @else
                        <li><a href="{{url('')}}/account/wishlist">Wishlist</a></li>
                    @endif

                    <li><a href="{{url('')}}/logout">Logout</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
