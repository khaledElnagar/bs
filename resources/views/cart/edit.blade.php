@extends('layouts.app')
@section('content')
        <!-- breadcrums -->
<div id="jm-pathway" class="clearfix">
    <div class="main" class="clearfix">
        <div class="inner" class="clearfix">
            <h4 class="no-display">You're currently on:</h4>
            <ul class="breadcrumbs">
                <li class="home">
                    <a href="{{url('')}}/" title="Go to Home Page">Home</a>
                </li>
                <li><i class="icon-caret-right"></i></li>
                <li class="product">
                    <strong>{{$order->book->name}}</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- // breadcrums -->

<!-- BEGIN: MAIN CONTAINER -->
<div id="jm-container" class="jm-lo-2colsl jm-col-right  wrap clearfix">

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
                        <script type="text/javascript">
                            var optionsPrice = new Product.OptionsPrice([]);
                            if (jQuery) {
                                jQuery("#ja-tab-products").ready(function ($) {
                                    $("#ja-tab-products").jaContentTabs();
                                });
                            }
                            jQuery(document).ready(function () {
                                urllocation = window.location;

                                if (urllocation.toString().indexOf("#review-form") > 0) {
                                    jQuery("ul.ja-tab-navigator").find("a|[href='#ja-tabitem-reviews']").trigger("click");
                                    window.location = "#ja-tabitem-reviews";
                                }
                            });
                        </script>
                        <div id="messages_product_view"></div>
                        <div class="product-view">
                            <div class="product-essential col1-set">
                                <form action="{{url('')}}/cart/{{$order->id}}"
                                      method="post" >
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}

                                    <div class="no-display">
                                        <input type="hidden" name="id" value="{{$order->book->id}}"/>
                                    </div>
                                    <div class="product-essential-inner">
                                        <div class="product-img-box">

                                            <p class="product-image product-image-zoom img-desktop"
                                               style="width:270px; height:405px;">
                                                <img id="main-image"
                                                     src="{{asset('storage/app/public/images/normal')}}/{{$order->book->image}}"
                                                     data-zoom-image="{{asset('storage/app/public/images/thumbnail/550x550')}}/{{$order->book->image}}"
                                                     alt="The Merciful Scar" title="The Merciful Scar"/></p>

                                            <p class="product-image product-image-zoom mobile-images"
                                               style="width:270px; height:405px;">
                                                <img id="main-image-mobile"
                                                     src="media/catalog/product/cache/3/thumbnail/270x405/9df78eab33525d08d6e5fb8d27136e95/8/_/8.jpg"
                                                     alt="The Merciful Scar" title="The Merciful Scar"/></p>

                                            <div class="jm-product-lemmon">
                                                <div class="prev"><span><i class="fa fa-caret-left"></i></span>
                                                </div>
                                                <div class="more-views">
                                                    <ul>
                                                        <!-- version is 1.9.1.0 or greater-->
                                                        <li class="active">
                                                            <a href="{{asset('storage/app/public/images/normal')}}/{{$order->book->image}}"
                                                               rel="{{asset('storage/app/public/images/normal')}}/{{$order->book->image}}"
                                                               title="{{$order->book->name}}"
                                                               onclick="return false;">
                                                                <!-- The below should remain the same as before -->
                                                                <img
                                                                        src="{{asset('storage/app/public/images/thumbnail/60x80')}}/{{$order->book->image}}"
                                                                        alt=""
                                                                        title=""/>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="next"><span><i class="fa fa-caret-right"></i></span>
                                                </div>

                                                <script type="text/javascript"
                                                        src="{{asset('css')}}/default/jm_book/js/easy-slider.js"></script>
                                                <script type="text/javascript">
                                                    // <![CDATA[
                                                    (function ($) {
                                                        $(document).ready(function ($) {
                                                            $("div.more-views").easySlider({
                                                                mainImg: "p.product-image img",
                                                                btnNext: ".jm-product-lemmon .next",
                                                                btnPrev: ".jm-product-lemmon .prev",
                                                                animate: true,
                                                                loop: true,
                                                                speed: 300,
                                                                width: 100,
                                                                start: 0
                                                            });
                                                        });
                                                    })(jQuery);
                                                    // ]]>
                                                </script>
                                            </div>

                                            <script type="text/javascript"
                                                    src="{{asset('css')}}/default/jm_book/js/jquery.elevatezoom.js"></script>

                                            <script type="text/javascript">
                                                // <![CDATA[
                                                function isMobile() {
                                                    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                }
                                                if (!isMobile()) {
                                                    (function ($) {
                                                        $(document).ready(function ($) {
                                                            if ($("#main-image").length) {
                                                                $("#main-image").elevateZoom({
                                                                    scrollZoom: false,
                                                                    borderColour: "#e7e7e7",
                                                                    tintColour: "#e7e7e7",
                                                                    zoomWindowWidth: 500,
                                                                    zoomWindowHeight: 500,
                                                                    lensFadeIn: 500,
                                                                    lensFadeOut: 500,
                                                                    lensSize: 150,
                                                                    easing: true,
                                                                });
                                                            }
                                                        });
                                                    })(jQuery);
                                                }
                                                // ]]>
                                            </script>
                                        </div>
                                        <div class="product-shop">
                                            <div class="product-name">
                                                <h1>{{$order->book->name}}</h1>
                                            </div>
                                            <div class="author">
                                                {{$order->book->author}}
                                            </div>
                                            <p class="email-friend"><a
                                                        href="sendfriend/product/send/id/7/index.html">Email to a
                                                    Friend</a></p>

                                            <p class="availability in-stock">Availability: <span>In stock</span></p>

                                            <div class="qty-box">
                                                <label for="qty">Qty:</label>

                                                <div class="qty-box-count">
                                                    <div id='qty_down'><span>-</span></div>
                                                    <input type="text" name="quantity" id="qty" maxlength="12" value="{{$order->quantity}}"
                                                           title="Qty" class="input-text qty"/>

                                                    <div id='qty_up'><span>+</span></div>
                                                    <script type="text/javascript">
                                                        jQuery(document).ready(function ($) {
                                                            $(".qty-box #qty_up").click(function () {
                                                                a = parseInt($(".qty-box #qty").val());
                                                                if (a)
                                                                    $(".qty-box #qty").val(a + 1);
                                                                else $(".qty-box #qty").val(1);
                                                            });
                                                            $(".qty-box #qty_down").click(function () {
                                                                a = parseInt($(".qty-box #qty").val());
                                                                if (a > 1)
                                                                    $(".qty-box #qty").val(a - 1);
                                                                else $(".qty-box #qty").val(1);
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>


                                            <div class="price-box">
                                                                <span class="regular-price" id="product-price-7">
                                            <span class="price">£{{number_format($order->book->price,2,'.','')}}</span>                                    </span>

                                            </div>


                                            <div class="add-to-box">
                                                <div class="add-to-cart">
                                                    <button type="submit" title="Update cart"
                                                            class="button btn-cart"
                                                    ><span><i
                                                                    class="icon-shopping-cart"></i>Update cart</span>
                                                    </button>
                                                </div>


                                            </div>
                                            <div class="short-description">
                                                <div class="std">
                                                    <ul>
                                                        <li><strong>Release year </strong>{{$order->book->publish_year}}</li>
                                                        <li><strong>ISBN </strong>{{$order->book->isbn}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="addthis_toolbox addthis_default_style">&nbsp;</div>
                                            <script type="text/javascript">// <![CDATA[
                                                var addthis_config = {"data_track_addressbar": false};
                                                // ]]></script>
                                            <script type="text/javascript"
                                                    src="{{asset('js')}}/addthis_widget.js#pubid=ra-51f5e398294794cf"></script>
                                        </div>
                                        <div class="clearer"></div>
                                    </div>
                                </form>
                                <script type="text/javascript">
                                    //<![CDATA[
                                    var productAddToCartForm = new VarienForm('product_addtocart_form');
                                    productAddToCartForm.submit = function (button, url) {
                                        if (this.validator.validate()) {
                                            var form = this.form;
                                            var oldUrl = form.action;

                                            if (url) {
                                                form.action = url;
                                            }
                                            var e = null;
                                            try {
                                                this.form.submit();
                                            } catch (e) {
                                            }
                                            this.form.action = oldUrl;
                                            if (e) {
                                                throw e;
                                            }

                                            if (button && button != 'undefined') {
                                                button.disabled = true;
                                            }
                                        }
                                    }.bind(productAddToCartForm);

                                    productAddToCartForm.submitLight = function (button, url) {
                                        if (this.validator) {
                                            var nv = Validation.methods;
                                            delete Validation.methods['required-entry'];
                                            delete Validation.methods['validate-one-required'];
                                            delete Validation.methods['validate-one-required-by-name'];
                                            if (this.validator.validate()) {
                                                if (url) {
                                                    this.form.action = url;
                                                }
                                                this.form.submit();
                                            }
                                            Object.extend(Validation.methods, nv);
                                        }
                                    }.bind(productAddToCartForm);
                                    //]]>
                                </script>
                                <div id="ja-tab-products" class="product-collateral">
                                    <ul class="ja-tab-navigator clearfix">
                                        <li><a href="#ja-tab-description">description</a></li>
                                    </ul>
                                    <div class="ja-tab-content">
                                        <div id="ja-tab-description">
                                            <div class="box-collateral box-description">
                                                <div class="std">
                                                    <p>{!! $order->book->description !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-collateral box-up-sell">
                                <h2>You may also be interested in the following product(s)</h2>
                                <ul id="upsell-product-table" class="products-grid">
                                    @foreach($related_books as $related_book)
                                        <li class="item">
                                            <div class="inner">
                                                <div class="product-image">
                                                    <a href="{{url('')}}/book/{{$related_book->id}}"
                                                       title="{{$related_book->name}}"><img
                                                                src="{{asset('storage/app/public/images/thumbnail/170x250')}}/{{$related_book->image}}"
                                                                width="170" height="250" alt=" {{$related_book->name}}"/></a>
						<span class="actions">
														<button class="form-button btn-cart"
                                                                onclick="setLocation('checkout/cart/add/uenc/aHR0cDovL2Jvb2tzaG9wLmRlbW8udWJlcnRoZW1lLmNvbS90aGUtbWVyY2lmdWwtc2Nhci5odG1s/product/4/form_key/ywzHUeaOL2NABWo4/index.html')">
                                                            <span class="icon-shopping-cart"></span>
                                                        </button>
													</span>
                                                </div>
                                                <div class="product-information">
                                                    <h5><a href="{{url('')}}/book/{{$related_book->id}}"
                                                           title="{{$related_book->name}}">
                                                            {{$related_book->name}}
                                                        </a></h5>

                                                    <div class="author">
                                                        {{$related_book->author}}
                                                    </div>


                                                    <div class="price-box">
                                                                <span class="regular-price" id="product-price-4-upsell" >
                                            <span class="price" style="color: #ff0000 !important;">£{{number_format($related_book->price,2,'.','')}}</span>                                    </span>

                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <td class="empty">&nbsp;</td>
                                    <td class="empty">&nbsp;</td>
                                    <td class="empty">&nbsp;</td>
                                </ul>
                                <script type="text/javascript">decorateTable('upsell-product-table')</script>
                            </div>
                        </div>


                        <script type="text/javascript">
                            var lifetime = 3600;
                            var expireAt = Mage.Cookies.expires;
                            if (lifetime > 0) {
                                expireAt = new Date();
                                expireAt.setTime(expireAt.getTime() + lifetime * 1000);
                            }
                            Mage.Cookies.set('external_no_cache', 1, expireAt);
                        </script>
                        <!-- // primary content -->
                    </div>
                </div>
            </div>
            <!-- END: CONTENT -->
        </div>
    </div>
</div>
<!-- END: MAIN CONTAINER -->


@endsection
