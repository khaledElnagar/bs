@extends('layouts.app')
@section('content')

        <!-- BEGIN: MAIN CONTAINER -->
<div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix">
    @if(count($orders))
        <div class="main clearfix" style="margin-top:50px;">
            <div id="jm-mainbody" class="clearfix">
                <!-- BEGIN: CONTENT -->
                <div id="jm-main">
                    <div class="inner clearfix">
                        <!-- global messages -->

                        <!-- // global messages -->
                        <!-- MASS Head -->
                        <div id="jm-current-content" class="clearfix">
                            <!-- primary content -->
                            <div class="cart">
                                <div class="page-title title-buttons">
                                    <h1>Shopping Cart</h1>
                                </div>
                                <fieldset>
                                    <table id="shopping-cart-table" class="data-table cart-table">
                                        <colgroup>
                                            <col width="1">
                                            <col>
                                            <col width="1">
                                            <col width="1">
                                            <col width="1">
                                            <col width="1">
                                            <col width="1">

                                        </colgroup>
                                        <thead>
                                        <tr class="first last">
                                            <th rowspan="1">&nbsp;</th>
                                            <th rowspan="1"><span class="nobr">Product Name</span></th>
                                            <th rowspan="1"></th>
                                            <th class="a-center" colspan="1"><span class="nobr">Unit Price</span></th>
                                            <th rowspan="1" class="a-center">Qty</th>
                                            <th class="a-center" colspan="1">Subtotal</th>
                                            <th rowspan="1" class="a-center">&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr class="first last">
                                            <td colspan="50" class="a-right last">
                                                <button type="button" title="Continue Shopping"
                                                        class="button btn-continue"
                                                        onclick="setLocation(&#39;http://bookshop.demo.ubertheme.com/nam-dolor-felis.html&#39;)">
                                                    <span><span>Continue Shopping</span></span></button>
                                                <!--[if lt IE 8]>
                                                <input type="hidden" id="update_cart_action_container"/>
                                                <script type="text/javascript">
                                                    //<![CDATA[
                                Event.observe(window, 'load', function()
                                {
                                    // Internet Explorer (lt 8) does not support value attribute in button elements
                                    $emptyCartButton = $('empty_cart_button');
                                    $cartActionContainer = $('update_cart_action_container');
                                    if ($emptyCartButton && $cartActionContainer) {
                                        Event.observe($emptyCartButton, 'click', function()
                                        {
                                            $emptyCartButton.setAttribute('name', 'update_cart_action_temp');
                                            $cartActionContainer.setAttribute('name', 'update_cart_action');
                                            $cartActionContainer.setValue('empty_cart');
                                        });
                                    }

                                });
                            //]]>
                            </script>
                            <![endif]-->
                                            </td>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        @foreach($orders as$order)
                                            <td><a href="{{url('')}}/book/{{$order->book_id}}"
                                                   title="{{$order->book->name}}" class="product-image"><img
                                                            src="{{asset('')}}/storage/app/public/images/thumbnail/80x120/{{$order->book->image}}"
                                                            width="90"
                                                            height="135"
                                                            alt="Etiam auctor"></a></td>
                                            <td>
                                                <h2 class="product-name">
                                                    <a href="{{url('')}}/book/{{$order->book->id}}">{{$order->book->name}}</a>
                                                </h2>
                                            </td>
                                            <td class="a-center">
                                                <a href="{{url('')}}/cart/{{$order->id}}/edit"
                                                   title="Edit item parameters">Edit</a>
                                            </td>


                                            <td class="a-right">
                            <span class="cart-price">
                                                <span class="price">£{{number_format($order->price,2,'.','')}}</span>
            </span>


                                            </td>
                                            <td class="a-center">
                                                <span class="price">{{$order->quantity}}</span>
                                            </td>
                                            <td class="a-right">
                    <span class="cart-price">

                                                <span class="price">£{{number_format($order->total,2,'.','')}}</span>
        </span>
                                            </td>

                                            <td class="a-center last">
                                                <form action="{{url('')}}/cart/{{$order->id}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <button type="submit" name="delete"
                                                            title="Update Shopping Cart" class="button btn-update">
                                                        <i class="icon-remove"></i></button>

                                                </form>

                                            </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">decorateTable('shopping-cart-table')</script>
                                </fieldset>
                                </form>
                                <div class="cart-collaterals clearfix">
                                    <div class="totals clearfix">
                                        <div class="block block-totals">
                                            <div class="block-title">
                                                <strong><span>Shopping Cart Total</span></strong>
                                            </div>
                                            <table id="shopping-cart-totals-table">
                                                <colgroup>
                                                    <col>
                                                    <col width="1">
                                                </colgroup>
                                                <tfoot>
                                                <tr>
                                                    <td style="" class="a-right" colspan="1">
                                                        <strong>Grand Total</strong>
                                                    </td>
                                                    <td style="" class="a-right">
                                                        <strong><span
                                                                    class="price">£@if(auth()->user()->discount>0 && auth()->user()->approved_university ==1){{number_format($total_price-($total_price*auth()->user()->discount/100),2,'.','')}} @else{{number_format($total_price,2,'.','')}} @endif</span></strong>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <tr>
                                                    <td style="" class="a-right" colspan="1">
                                                        Subtotal
                                                    </td>

                                                    <td style="" class="a-right">
                                                        <span class="price">£{{number_format($total_price,2,'.','')}}</span>
                                                    </td>
                                                </tr>
                                                </tbody>

                                                <tbody>
                                                <tr>
                                                    <td style="" class="a-right" colspan="1">
                                                        Discount
                                                    </td>

                                                    <td style="" class="a-right">
                                                        <span class="price">@if(auth()->user()->discount>0 && auth()->user()->approved_university ==1){{auth()->user()->discount}}
                                                            % @else 0 @endif</span></td>
                                                </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="block-totals">
                                            <ul class="checkout-types">
                                                <li>
                                                    <button type="button" title="Proceed to Checkout"
                                                            class="button btn-proceed-checkout btn-checkout"
                                                            onclick="window.location='{{url('')}}/checkout'">
                                                        <span><span>Proceed to Checkout</span></span></button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col1-set clearfix">
                                        <div class="col-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // primary content -->
                        </div>
                    </div>
                </div>
                <!-- END: CONTENT -->
            </div>
        </div>
    @else
        <div id="jm-container" class="jm-lo-1col wrap  not-breadcrumbs clearfix" style="margin:50px 0 90px 0">
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
                                <div class="page-title">
                                    <h1>Shopping Cart is Empty</h1>
                                </div>
                                <div class="cart-empty">
                                    <p>You have no items in your shopping cart.</p>

                                    <p>Click <a href="{{url('')}}/">here</a> to continue shopping.</p>
                                </div>
                                <!-- // primary content -->
                            </div>
                        </div>
                    </div>
                    <!-- END: CONTENT -->
                </div>
            </div>
        </div>
    @endif
</div>
<!-- END: MAIN CONTAINER -->


@endsection
