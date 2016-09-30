@extends('layouts.app')
@section('content')
        <!-- BEGIN: MAIN CONTAINER -->
<div id="jm-container" class="jm-lo-2colsl jm-col-left not-breadcrumbs wrap clearfix">
    <div class="main clearfix">
        <div id="jm-mainbody" class="clearfix" style="margin: 50px 0 50px 0;">
            <!-- BEGIN: CONTENT -->
            <div id="jm-main" style="height: auto !important;">
                <div class="inner minner clearfix">
                    <div id="jm-current-content" class="clearfix">
                        <!-- //TOP SPOTLIGHT 3 -->
                        <!-- //TOP SPOTLIGHT 3 -->
                        <!-- //TOP SPOTLIGHT 3 -->
                        <!-- //TOP SPOTLIGHT 3 -->
                        <!-- MASS Head -->
                        <!-- primary content -->
                        <div class="my-account">
                            <div class="my-wishlist">
                                @if(count($cart_wishes))
                                    <div class="page-title title-buttons">
                                        <h1>My Wishlist</h1>
                                    </div>

                                    <fieldset>
                                        <table class="data-table" id="wishlist-table">
                                            <thead>
                                            <tr class="first last">
                                                <th>Image</th>
                                                <th>Product Details</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cart_wishes as $wish)
                                                <tr id="item_2" class="">

                                                    <td width="100px;">
                                                        <a class="product-image"
                                                           href="{{url('')}}/book/{{$wish->book_id}}"
                                                           title="{{url('')}}/book/{{$wish->book->name}}">
                                                            <img src="{{asset('')}}/storage/app/public/images/thumbnail/146x219/{{$wish->book->image}}"
                                                                 alt="{{url('')}}/book/{{$wish->book->name}}">
                                                        </a>

                                                    </td>
                                                    <td>
                                                        <h3 class="product-name"><a
                                                                    href="{{url('')}}/book/{{$wish->book_id}}"
                                                                    title="{{$wish->book->name}}">{{$wish->book->name}}</a>
                                                        </h3>


                                                        <div class="cart-cell">
                                                            <div class="price-box">
                                                                    <span class="regular-price" id="product-price-20">
                                                                        £
                                                                        <input type="text" readonly class="price"
                                                                               id="price-{{$wish->id}}"
                                                                               value="{{number_format($wish->total,2,'.','')}}"
                                                                               style="border:none;">
                                                                    </span>
                                                            </div>

                                                            <div class="add-to-cart-alt">
                                                                <div class="qty-box">

                                                                    <form action="{{url('')}}/cart"
                                                                          method="post">
                                                                        {{ csrf_field() }}
                                                                        <div class="no-display">
                                                                            <input type="hidden" name="id"
                                                                                   value="{{$wish->book_id}}"/>
                                                                        </div>
                                                                        <div class="qty-box-count"
                                                                             style="margin-right: 10px;">
                                                                            <div id="qty_down"
                                                                                 class="qty_down-{{$wish->id}}">
                                                                                   <span
                                                                                   >-</span>
                                                                            </div>
                                                                            <input type="text"
                                                                                   name="quantity"
                                                                                   id="qty"
                                                                                   class="qty-{{$wish->id}}"
                                                                                   maxlength="12"
                                                                                   value="{{$wish->quantity}}" readonly
                                                                                   title="Qty" class="input-text qty"/>

                                                                            <div id="qty_up"
                                                                                 class="qty_up-{{$wish->id}}">
                                                                                <span>+</span>
                                                                            </div>
                                                                        </div>
                                                                        <script type="text/javascript">
                                                                            jQuery(document).ready(function ($) {
                                                                                $(".qty-box .qty_up-{{$wish->id}}").click(function () {
                                                                                    a = parseInt($(".qty-box .qty-{{$wish->id}}").val());
                                                                                    if (a) {
                                                                                        $(".qty-box .qty-{{$wish->id}}").val(a + 1);
                                                                                        $("#price-{{$wish->id}}").val((a + 1) * {{$wish->price}});
                                                                                    }
                                                                                    else {
                                                                                        $(".qty-box .qty-{{$wish->id}}").val(1);
                                                                                        $("#price-{{$wish->id}}").val({{$wish->price}});
                                                                                    }
                                                                                });
                                                                                $(".qty-box .qty_down-{{$wish->id}}").click(function () {
                                                                                    a = parseInt($(".qty-box .qty-{{$wish->id}}").val());
                                                                                    if (a > 1) {
                                                                                        $(".qty-box .qty-{{$wish->id}}").val(a - 1);
                                                                                        $("#price-{{$wish->id}}").val((a - 1) * {{$wish->price}});

                                                                                    }
                                                                                    else {
                                                                                        $(".qty-box .qty-{{$wish->id}}").val(1);
                                                                                        $("#price-{{$wish->id}}").val({{$wish->price}});

                                                                                    }
                                                                                });
                                                                            });
                                                                        </script>
                                                                        <button type="submit" title="Add to Cart"
                                                                                class="button btn-cart">
                                                                            <span><span>Add to Cart</span></span>
                                                                        </button>

                                                                    </form>
                                                                    <form action="{{url('')}}/wish/{{$wish->id}}"
                                                                          method="POST">
                                                                        <input type="hidden" name="_method"
                                                                               value="DELETE">
                                                                        {{ csrf_field()}}
                                                                        <button type="submit" name="delete"
                                                                                title="Update Shopping Cart"
                                                                                class="button btn-update">
                                                                            <i class="icon-remove"></i></button>

                                                                    </form>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="description std">
                                                            <div class="inner">
                                                                <article>{!! $wish->book->description !!}</article>
                                                            </div>
                                                        </div>

                                                    </td>

                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            decorateTable('wishlist-table');


                                            function focusComment(obj) {
                                                if (obj.value == 'Please, enter your comments...') {
                                                    obj.value = '';
                                                } else if (obj.value == '') {
                                                    obj.value = 'Please, enter your comments...';
                                                }
                                            }

                                            function addWItemToCart(itemId) {
                                                var url = 'http://bookshop.demo.ubertheme.com/wishlist/index/cart/item/%item%/uenc/aHR0cDovL2Jvb2tzaG9wLmRlbW8udWJlcnRoZW1lLmNvbS93aXNobGlzdC8_X19fc3RvcmU9ZGVmYXVsdA,,/form_key/uAKK0HZrQnKogt4Y/';
                                                url = url.gsub('%item%', itemId);
                                                var form = $('wishlist-view-form');
                                                if (form) {
                                                    var input = form['qty[' + itemId + ']'];
                                                    if (input) {
                                                        var separator = (url.indexOf('?') >= 0) ? '&' : '?';
                                                        url += separator + input.name + '=' + encodeURIComponent(input.value);
                                                    }
                                                }
                                                setLocation(url);
                                            }

                                            function confirmRemoveWishlistItem() {
                                                return confirm('Are you sure you want to remove this product from your wishlist?');
                                            }
                                            //]]>
                                        </script>
                                        <script type="text/javascript">decorateTable('wishlist-table')</script>
                                        <div class="buttons-set buttons-set2">

                                            <button id="update" type="submit" name="update" title="update Wishlist"
                                                    class="button btn-share">
                                                <span><span>update Wishlist</span></span></button>

                                            <form action="{{url('')}}/wish/clear" method="POST">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{csrf_field()}}
                                                <button type="submit" title="Clear Wishlist"
                                                        class="button btn-add">
                                                    <span><span>Clear Wishlist</span></span></button>
                                            </form>
                                            <form action="{{url('')}}/wish/order" method="POST">
                                                {{csrf_field()}}
                                                <button type="submit" name="do" title="Order Wishlist"
                                                        class="button btn-update">
                                                    <span><span>Order Wishlist</span></span></button>
                                            </form>
                                        </div>
                                    </fieldset>

                                    <script type="text/javascript">
                                        //<![CDATA[
                                        var wishlistForm = new Validation($('wishlist-view-form'));
                                        var wishlistAllCartForm = new Validation($('wishlist-allcart-form'));

                                        function calculateQty() {
                                            var itemQtys = new Array();
                                            $$('#wishlist-view-form .qty').each(
                                                    function (input, index) {
                                                        var idxStr = input.name;
                                                        var idx = idxStr.replace(/[^\d.]/g, '');
                                                        itemQtys[idx] = input.value;
                                                    }
                                            );

                                            $$('#qty')[0].value = JSON.stringify(itemQtys);
                                        }

                                        function addAllWItemsToCart() {
                                            calculateQty();
                                            wishlistAllCartForm.form.submit();
                                        }
                                        //]]>
                                    </script>
                                @else
                                    <div class="page-title">
                                        <h1>Wishlist is Empty</h1>
                                    </div>
                                    <div class="cart-empty">
                                        <p>You have no items in your Wishlist.</p>

                                        <p>Click <a href="{{url('')}}/">here</a> to continue shopping.</p>
                                    </div>

                                @endif
                            </div>
                            <ul id="success" style="
                                    background-position: 10px 9px!important;
                                    background-repeat: no-repeat!important;
                                    border-style: solid!important;
                                    border-width: 1px!important;
                                    font-size: 11px!important;
                                    font-weight: bold!important;
                                    min-height: 20px!important;
                                    padding: 8px 8px 8px 32px!important;
                                    background-color: #eff5ea;
                                    background-image: url({{asset('css/default/jm_book/images')}}/i_msg-success.gif);
                                    border-color: #446423;
                                    color: #3d6611;
                                    margin: 10px 0 10px!important;
                                    display: none;
                                    margin-bottom: 10px;
                                    float: right;
                                    width:48%;">
                                <li style="margin: 0 0 3px!important;font-size: 100%">
                                    <ul>
                                        <li><span>Wishlist Successfully updated !</span></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul id="fail" style="
                                       background-position: 10px 9px!important;
                                    background-repeat: no-repeat!important;
                                    border-style: solid!important;
                                    border-width: 1px!important;
                                    font-size: 11px!important;
                                    font-weight: bold!important;
                                    min-height: 24px!important;
                                    padding: 8px 8px 8px 32px!important;
                                    background-color: #faebe7;
                                    background-image: url({{asset('css/default/jm_book/images')}}/i_msg-error.gif);
                                    border-color: #F0141E;
                                    color: #F0141E;
                                    margin: 10px 0 10px!important;
                                    display: none;
                                    margin-bottom: 10px;
                                    float: right;
                                    width:48%;">
                                <li style="margin: 0 0 3px!important;font-size: 100%">
                                    <ul>
                                        <li><span>Something went wrong !</span></li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="buttons-set" >
                                <p class="back-link"><a href="{{url('')}}/">
                                        <small>«</small>
                                        Back</a></p>
                            </div>
                        </div>                            <!-- // primary content -->
                    </div>
                </div>
                <div id="ajax-loader" style="width:100%;display: none">
                    <div style="width:5%;margin: 0 auto">
                        <img src="{{asset('')}}/images/ajax-loader.gif">
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
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<script>
    jQuery.noConflict();

    jQuery(document).ready(function () {
        jQuery('article').readmore({
            collapsedHeight: 126,
            heightMargin: 16,
            speed: 1000,
            lessLink: '<a href="#">Read less</a>'
        });

        function explode() {
            jQuery('div[id="ajax-loader"]').css('display', 'none');
            jQuery('ul[id="success"]').css('display', 'block');
        }

        function fail() {
            jQuery('div[id="ajax-loader"]').css('display', 'none');
            jQuery('ul[id="fail"]').css('display', 'block');
        }

        jQuery('#update').on('click', function (e) {
            e.preventDefault(e);
            var data = [];
            var i = 0;
            @foreach($cart_wishes as $wish)
                data[i] = "id{{$wish->id}}=" + jQuery('input[class="qty-{{$wish->id}}"]').val();
            i = i + 1;
                    @endforeach
                            var token = jQuery('meta[name="csrf-token"]').attr('content');

            jQuery.ajax({
                type: 'get',           // POST Request
                url: '{{url('')}}/wish/updateAll/',            // Url of the Route (in this case user/save not only save)
                data: data.join("&") + "&_token=" + token,         // Serialized Data
                dataType: 'json',       // Data Type of the Transmit
                beforeSend: function (xhr) {
                    // Function needed from Laravel because of the CSRF Middleware
                    var token = jQuery('meta[name="csrf-token"]').attr('content');

                    if (token) {
                        return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                    }
                },
                success: function (data) {
                    // Successfuly called the Controler
                    // Check if the logic was successful or not
                    jQuery('div[id="ajax-loader"]').css('display', 'block');
                    setTimeout(explode, 2000);

                    if (data.status == 'success') {
                        console.log('alles ok');
                    } else {
                        console.log(data.msg);
                    }
                },
                error: function (data) {
                    // Error while calling the controller (HTTP Response Code different as 200 OK
                    jQuery('div[id="ajax-loader"]').css('display', 'block');
                    setTimeout(fail, 2000);

                    console.log('Error:', data);
                }
            });
        });

    })


</script>
@endsection
