<!-- BEGIN: toolbar -->
<div id="jm-head" class="wrap clearfix">
    <div class="main">
        <div class="inner clearfix">
            <ul class="customer-services">
                <li><em class="icon-phone"></em>{{$contact->phone}}</li>

            </ul>
            <!-- BEGIN: QUICK ACCESS -->
            <div id="jm-quickaccess" class="quick-access has-toggle">
                <div class="btn-toggle quickaccess-toggle">
                    @if(auth()->check())
                        <i class="icon-user"></i><strong>{{auth()->user()->name}}</strong>
                    @else
                        <i class="icon-user"></i><strong>Account</strong>
                    @endif
                </div>
                <div class="inner-toggle">
                    <div class="shop-access">
                        <ul class="links">
                            <li class="first"><a href="{{url('')}}/account/dashboard" title="My Account">My
                                    Account</a></li>
                            <li><a href="{{url('')}}/account/wishlist" title="My Wishlist">My Wishlist @if($total_wishes == 1) (1 item) @elseif($total_wishes > 1 ) ({{$total_wishes}} items)@endif</a></li>
                            <li><a href="{{url('')}}/cart" title="My Cart" class="top-link-cart">My Cart @if($total_quantity == 1) (1 item) @elseif($total_quantity > 1 ) ({{$total_quantity}} items)@endif </a>
                            </li>
                            <li><a href="checkout/index.html" title="Checkout"
                                   class="top-link-checkout">Checkout</a></li>
                            <li class=" last">
                                @if(auth()->check())
                                    <a href="{{url('')}}/logout" title="Log Out">Log Out</a>

                                @else
                                    <a href="{{url('')}}/login" title="Log In">Log In</a>
                                    <a href="{{url('')}}/register" title="Log In">Register</a>

                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END: QUICK ACCESS -->
            <!-- BEGIN: QUICK ACCESS -->
            <!-- END: QUICK ACCESS -->
            <!-- BEGIN: MY CART-->
            <div id="jm-mycart" class="has-toggle">
                <div class="jmajmxloading">&nbsp;</div>
                <div class="btn-toggle mycart-toggle">
                    <i class="icon-shopping-cart"></i>
				<span>
					Shopping Cart (<a class="gotocart"
                                                         href="{{url('')}}/cart">{{$total_quantity}}&nbsp;items</a>)				</span>
                </div>
                <div class="inner-toggle">
                    <div class="block block-cart">
                        <div class="block-title">
                            <strong><span>My Cart</span></strong>
                        </div>
                        <div class="block-content">
                            <ol id="cart-sidebar" class="mini-products-list">
                                @foreach($cart_orders as $cart_order )
                                    <li class="item">
                                        <a href="{{url('')}}/book/{{$cart_order->book_id}}"
                                           title="{{$cart_order->book->name}}" class="product-image"><img
                                                    src="{{asset('')}}/storage/app/public/images/thumbnail/60x80/{{$cart_order->book->image}}"
                                                    width="50" height="70"
                                                    alt="Top Secret  Destinations"></a>

                                        <div class="product-details">
                                            <p class="product-name">
                                                <a href="{{url('')}}/book/{{$cart_order->book_id}}">Top
                                                    {{$cart_order->book->name}} </a></p>

                                            <span class="price">£{{number_format($cart_order->price,2,'.','')}}</span>


                                            <span>x ({{$cart_order->quantity}})</span>

                                            <a class="edit"
                                               href="{{url('')}}/cart/{{$cart_order->id}}/edit"
                                               title="Edit item"><i class="icon-edit"></i></a>

                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                            <script type="text/javascript">decorateList('cart-sidebar', 'none-recursive')</script>


                            <div class="summary">
                                <p class="amount">There are <a
                                            href="http://bookshop.demo.ubertheme.com/checkout/cart/">{{$total_quantity}} items</a> in your
                                    cart.</p>

                                <p class="subtotal">
                                    <span class="cartlabel">Sub Total :</span> <span class="price">£{{number_format($total_price,2,'.','')}}</span>
                                </p>
                            </div>
                            <div class="actions">
                                <p class="paypal-logo">
                                    <a data-action="checkout-form-submit"
                                       id="ec_shortcut_53dd39bab6b6f8501ddfc32854aab561"
                                       href="http://bookshop.demo.ubertheme.com/paypal/express/start/button/1/"><img
                                                src="./Shopping Cart_files/checkout-logo-medium.png"
                                                alt="Checkout with PayPal" title="Checkout with PayPal"></a>
                                </p>
                                <li>
                                    <p class="paypal-logo">
                                        <span class="paypal-or">-OR-</span>
                                    </p>
                                </li>
                                <button type="button" title="Checkout" class="button btn-checkout"
                                        onclick="setLocation(&#39;http://bookshop.demo.ubertheme.com/checkout/onepage/&#39;)">
                                    <span><span>Checkout</span></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: MY CART -->
        </div>
    </div>
    <script type="text/javascript">
        //<![CDATA[
        (function ($) {
            $("#jm-head #jm-quickaccess,#jm-setting,#jm-mycart").mouseenter(function () {
                $(this).children().addClass("active");
                if ($("#jmoverlay").length <= 0) {
                    jmoverlay = $('<div id="jmoverlay" class="jmoverlay"></div>');
                    jmoverlay.appendTo('#jm-wrapper');
                    jmoverlay.bind("click", function () {
                        $("#jm-head #jm-quickaccess,#jm-setting,#jm-mycart").children().removeClass("active");
                        $(this).remove();
                    })
                }
            }).mouseleave(function () {
                $(this).children().removeClass("active");
                $("#jmoverlay").remove();
            });

            $("#jm-search .btn-toggle").click(function () {
                if ($(this).siblings(".inner-toggle").hasClass("active")) {

                    $(this).siblings(".inner-toggle").removeClass("active")
                } else {
                    $("#jm-head").css("z-index", 1);
                    $(this).siblings(".inner-toggle").addClass("active");
                }

            })
            $("#jm-search").mouseleave(function () {
                if ($(this).children(".inner-toggle").hasClass("active")) {
                    $("#jm-head").css("z-index", "");
                    $(this).children(".inner-toggle").removeClass("active")
                }
            });

            $("#jm-quickaccess .btn-toggle").hover(function (e) {
                $("#jm-quickaccess").toggleClass("active");
                if ($("#jm-quickaccess").hasClass("active")) {
                    if (window.myaccountIScrol !== undefined && window.myaccountIScrol !== null) {
                        window.myaccountIScrol.destroy();
                        window.myaccountIScrol = null;
                    }
                    if ($("#myaccountscroll").length) {
                        windowheight = $(window).height() - $("#jm-head").height();
                        windowheight = windowheight - parseInt($("#jm-quickaccess .inner-toggle").css("padding-top"));
                        if ($("#jm-quickaccess .inner-toggle").height() > windowheight) {
                            $("#myaccountscroll").css("height", windowheight);
                        }
                        setTimeout(function () {
                            window.myaccountIScrol = new iScroll("myaccountscroll", {
                                vScrollbar: true,
                                useTransform: true,
                                hScrollbar: false
                            });
                        }, 100);
                    } else {
                        quickaccess = $("#jm-quickaccess .inner-toggle").html();
                        myaccount = $('<div class="inner-togglecontent" />').append($("#jm-quickaccess .inner-toggle").html());
                        myaccount.css({float: "left", height: "auto"});
                        $("#jm-quickaccess .inner-toggle").html("");
                        myaccountscroll = $('<div id="myaccountscroll" />');
                        myaccount.appendTo(myaccountscroll);

                        windowheight = $(window).height() - $("#jm-head").height();
                        windowheight = windowheight - parseInt($("#jm-quickaccess .inner-toggle").css("padding-top"));
                        myaccountscroll.appendTo($("#jm-quickaccess .inner-toggle"));

                        setTimeout(function () {
                            if ($("#jm-quickaccess .inner-toggle").height() > windowheight) {
                                myaccountscroll.css("height", windowheight);
                                window.myaccountIScrol = new iScroll("myaccountscroll", {
                                    vScrollbar: true,
                                    useTransform: true,
                                    hScrollbar: false
                                });
                                window.myaccountIScrol.refresh();
                            }

                        }, 100);

                    }


                }

            });
        })(jQuery);
        //]]>
    </script>
</div>
<!-- END: toolbar -->
