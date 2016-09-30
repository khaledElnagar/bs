@extends('layouts.app')
@section('content')
    <div id="jm-wrapper">
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
                        <li class="category8">
                            <strong>{{$category->name}}</strong>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- // breadcrums -->
        <!-- BEGIN: MAIN CONTAINER -->
        <div id="jm-container" class="jm-lo-2colsl jm-col-left  wrap clearfix">
            <div class="main clearfix">
                <div id="jm-mainbody" class="clearfix">
                    <!-- BEGIN: CONTENT -->
                    <div id="jm-main">
                        <div class="inner minner clearfix">
                            <div id="jm-current-content" class="clearfix">
                                <!-- //TOP SPOTLIGHT 3 -->
                                <!-- MASS Head -->
                                <!-- primary content -->
                                <div class="page-title category-title">
                                    <h1>{{$category->name}}</h1>
                                </div>


                                <div class="category-products">
                                    <div class="toolbar">
                                        <p class="view-mode">
                                            <label>View as:</label>
                                            <span class="ico-outer active"><i class="icon-th-large"></i></span>
                                            <a href="hot-booksa927.html?mode=list" title="List" class="list"><span
                                                        class="ico-outer"><i class="icon-th-list"></i></span></a>
                                        </p>

                                        <div class="limiter">
                                            <label>Show:</label>

                                            <div class="select-box">
                                                <div class="sub-select-box">
                                                    <select onchange="setLocation(this.value)">
                                                        <option value="http://bookshop.demo.ubertheme.com/hot-books.html?limit=12"
                                                                selected="selected">
                                                            12
                                                        </option>
                                                        <option value="hot-books45c7.html?limit=24">
                                                            24
                                                        </option>
                                                        <option value="hot-books409f.html?limit=36">
                                                            36
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            per page
                                        </div>

                                        <div class="sort-by">
                                            <label>Sort By:</label>

                                            <div class="select-box">
                                                <div class="sub-select-box">
                                                    <select onchange="setLocation(this.value)">
                                                        <option value="http://bookshop.demo.ubertheme.com/hot-books.html?dir=asc&amp;order=position"
                                                                selected="selected">
                                                            Position
                                                        </option>
                                                        <option value="hot-books79f7.html?dir=asc&amp;order=name">
                                                            Name
                                                        </option>
                                                        <option value="hot-books6973.html?dir=asc&amp;order=price">
                                                            Price
                                                        </option>
                                                        <option value="hot-booksc689.html?dir=asc&amp;order=manufacturer">
                                                            Manufacturer
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="pages">
                                            <label>Page:</label>
                                            <ol>


                                                <li class="current">1</li>
                                                <li><a href="hot-books905b.html?p=2">2</a></li>


                                                <li>
                                                    <a class="next i-next" href="hot-books905b.html?p=2" title="Next">
                                                        <i class="icon-caret-right"></i>
                                                    </a>
                                                </li>
                                            </ol>

                                        </div>


                                    </div>


                                    <ul class="products-grid products-grid-special">
                                        <?php $counter = 1; ?>
                                        @foreach($books as $book)
                                            @if($counter % 5 == 1)
                                                <li class="item first" style="width:20%;">
                                            @elseif($counter % 5 == 0)
                                                <li class="item last" style="width:20%;">
                                            @else
                                                <li class="item" style="width:20%;">
                                                    @endif
                                                    <?php $counter++; ?>
                                                    <div class="inner">
                                                        <div class="product-image">
                                                            <a href="{{url('')}}/book/{{$book->id}}" class="image-photo"
                                                               title="{{$book->name}}">
                                                                <img id="product-collection-image-2" class="lazy"
                                                                     data-original="{{asset('storage/app/public/images/thumbnail')}}/146x219/{{$book->image}}"
                                                                     width="150" height="225" alt="{{$book->name}}"/>
                                                            </a>
							<span class="actions">
																<button class="form-button btn-cart"
                                                                        onclick="setLocation('http://bookshop.demo.ubertheme.com/checkout/cart/add/uenc/aHR0cDovL2Jvb2tzaG9wLmRlbW8udWJlcnRoZW1lLmNvbS9ob3QtYm9va3MuaHRtbA,,/product/2/form_key/ywzHUeaOL2NABWo4/')">
                                                                    <span class="icon-shopping-cart"></span>
                                                                </button>
															</span>
                                                            <ul class="add-to-links">
                                                                <li>
                                                                    <a href="wishlist/index/add/product/2/form_key/ywzHUeaOL2NABWo4/index.html"
                                                                       class="link-wishlist">
                                                                        Wishlist </a></li>
                                                                <li>
                                                                    <a href="catalog/product_compare/add/product/2/uenc/aHR0cDovL2Jvb2tzaG9wLmRlbW8udWJlcnRoZW1lLmNvbS9ob3QtYm9va3MuaHRtbA%2c%2c/form_key/ywzHUeaOL2NABWo4/index.html"
                                                                       class="link-compare">Compare</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-information">

                                                            <h5 class="product-name">
                                                                <a title="{{$book->name}}"
                                                                   href="{{url('')}}/book/{{$book->id}}">
                                                                    {{$book->name}} </a>
                                                            </h5>

                                                            <div class="author">
                                                                {{$book->author}}
                                                            </div>


                                                            <div class="price-box">

                                                                <p class="price">
                                                                    <span class="price-label">Regular Price:</span>
                                                                    <span class="price" id="old-price-2">
                                                                        £{{number_format($book->price,2,'.','')}}
                                                                    </span>
                                                                </p>


                                                            </div>


                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                    </ul>
                                    <script type="text/javascript">decorateGeneric($$('ul.products-grid'), ['odd', 'even', 'first', 'last'])</script>
                                    <div class="toolbar-bottom">
                                        <div class="toolbar">
                                            <p class="view-mode">
                                                <label>View as:</label>
                                                <span class="ico-outer active"><i class="icon-th-large"></i></span>
                                                <a href="hot-booksa927.html?mode=list" title="List" class="list"><span
                                                            class="ico-outer"><i class="icon-th-list"></i></span></a>
                                            </p>

                                            <div class="limiter">
                                                <label>Show:</label>

                                                <div class="select-box">
                                                    <div class="sub-select-box">
                                                        <select onchange="setLocation(this.value)">
                                                            <option value="http://bookshop.demo.ubertheme.com/hot-books.html?limit=12"
                                                                    selected="selected">
                                                                12
                                                            </option>
                                                            <option value="hot-books45c7.html?limit=24">
                                                                24
                                                            </option>
                                                            <option value="hot-books409f.html?limit=36">
                                                                36
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                per page
                                            </div>

                                            <div class="sort-by">
                                                <label>Sort By:</label>

                                                <div class="select-box">
                                                    <div class="sub-select-box">
                                                        <select onchange="setLocation(this.value)">
                                                            <option value="http://bookshop.demo.ubertheme.com/hot-books.html?dir=asc&amp;order=position"
                                                                    selected="selected">
                                                                Position
                                                            </option>
                                                            <option value="hot-books79f7.html?dir=asc&amp;order=name">
                                                                Name
                                                            </option>
                                                            <option value="hot-books6973.html?dir=asc&amp;order=price">
                                                                Price
                                                            </option>
                                                            <option value="hot-booksc689.html?dir=asc&amp;order=manufacturer">
                                                                Manufacturer
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="pages">
                                                <label>Page:</label>
                                                <ol>


                                                    <li class="current">1</li>
                                                    <li><a href="hot-books905b.html?p=2">2</a></li>


                                                    <li>
                                                        <a class="next i-next" href="hot-books905b.html?p=2"
                                                           title="Next">
                                                            <i class="icon-caret-right"></i>
                                                        </a>
                                                    </li>
                                                </ol>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $j(document).on('product-media-loaded', function () {
                                        ConfigurableMediaImages.init('small_image');
                                        ConfigurableMediaImages.setImageFallback(2, $j.parseJSON('{"option_labels":[],"small_image":{"2":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/7\/_\/7.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(12, $j.parseJSON('{"option_labels":[],"small_image":{"12":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/3\/_\/3.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(10, $j.parseJSON('{"option_labels":[],"small_image":{"10":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/5\/_\/5.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(7, $j.parseJSON('{"option_labels":[],"small_image":{"7":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/8\/_\/8.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(6, $j.parseJSON('{"option_labels":[],"small_image":{"6":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/6\/_\/6_1.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(5, $j.parseJSON('{"option_labels":[],"small_image":{"5":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/c\/v\/cvr9781476714783_9781476714783_hr__17241.1375286803.1280.1280_2.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(4, $j.parseJSON('{"option_labels":[],"small_image":{"4":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/9\/_\/9.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(3, $j.parseJSON('{"option_labels":[],"small_image":{"3":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/2\/_\/2_1.jpg"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(17, $j.parseJSON('[]'));
                                        ConfigurableMediaImages.setImageFallback(18, $j.parseJSON('[]'));
                                        ConfigurableMediaImages.setImageFallback(19, $j.parseJSON('{"option_labels":{"aliquam":{"configurable_product":{"small_image":"hot-books.html\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/5\/_\/5_1.png","base_image":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/image\/1800x\/602f0fa2c1f0d1ba5e241f914e856ff9\/5\/_\/5_1.png"},"products":["17"]},"praesent":{"configurable_product":{"small_image":"hot-books.html\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/4\/_\/4_2.png","base_image":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/image\/1800x\/602f0fa2c1f0d1ba5e241f914e856ff9\/4\/_\/4_2.png"},"products":["18"]}},"small_image":{"17":"hot-books.html\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/2\/_\/2_3.png","18":"hot-books.html\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/4\/_\/4_1.png","19":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/1\/_\/1_4.png"},"base_image":[]}'));
                                        ConfigurableMediaImages.setImageFallback(20, $j.parseJSON('{"option_labels":[],"small_image":{"20":"http:\/\/bookshop.demo.ubertheme.com\/media\/catalog\/product\/cache\/1\/small_image\/210x\/602f0fa2c1f0d1ba5e241f914e856ff9\/6\/_\/6.png"},"base_image":[]}'));
                                        $j(document).trigger('configurable-media-images-init', ConfigurableMediaImages);
                                    });
                                </script>
                                <!-- // primary content -->
                            </div>
                        </div>
                    </div>
                    <!-- END: CONTENT -->
                    <!-- BEGIN: COLUMN 1 -->
                    <div id="jm-col1" class="col-left side-col">
                        <div class="inner linner clearfix">


                            <script type="text/javascript"
                                    src="{{asset('css')}}/default/jm_book/joomlart/jmproductsslider/js/jcarousellite_1.0.1_custom.js"></script>


                            <script type="text/javascript">
                                jQuery.noConflict();
                                jQuery(document).ready(function ($) {
                                    $(".jm-products-slider-listing #jm-contain-5240417013137840321470563857").jCarouselLite({
                                        vertical: true,
                                        auto: 3000,
                                        speed: 2000,
                                        visible: 3,
                                        btnNext: ".jm-products-slider-listing .jm-slider-next",
                                        btnPrev: ".jm-products-slider-listing .jm-slider-prev",
                                        width: 270,
                                        width_img: 80
                                    });
                                });


                            </script>

                            <div class="block block-verticallist jm-products-slider-listing"
                                 id="jmmainwrap-jm-contain-5240417013137840321470563857">
                                <div class="block-title">
                                    <strong><span>Special books</span></strong>
                                </div>
                                <div class="block-content">
                                    <div class="control-barslide">
                                        <div class="jm-slider-prev"><i class="icon-caret-left"></i></div>
                                        <div class="jm-slider-next"><i class="icon-caret-right"></i></div>
                                    </div>
                                    <div class="jm-products-slider-content clearfix jm-products-slider-content109595990211367072081470563857">
                                        <div id="jm-contain-5240417013137840321470563857" class="jm-slider"
                                             style="overflow: hidden; width: 3060px; float: left; left: 0 !important;">
                                            <ul class="jm-slider-ul">
                                                @foreach($special_books as $special_book)
                                                    <li class="jm-slider-li"
                                                        style="float: left;width:255px;height:150px">
                                                        <div class="slider-inner">
                                                            <div class="product-image">
                                                                <a title="{{$special_book->name}}"
                                                                   href="{{url('')}}/book/{{$special_book->id}}">
                                                                    <img src="{{asset('storage/app/public/images/thumbnail/80x120')}}/{{$special_book->image}}"
                                                                         alt="{{$special_book->name}}"/>
                                                                </a>
                                                            </div>
                                                            <h5>
                                                                <a title="{{$special_book->name}}"
                                                                   href="{{url('')}}/book/{{$special_book->id}}">
                                                                    {{$special_book->name}} </a>
                                                            </h5>

                                                            <div class="author">
                                                                {{$special_book->author}}
                                                            </div>
                                                            <div class="price-box">
                                                                <span class="regular-price"
                                                                      id="product-price-22_jmproduct_967235099">
                                            <span class="price">£{{number_format($special_book->price,2,'.','')}}</span>                                    </span>

                                                            </div>


                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: COLUMN 1 -->
                </div>
            </div>
        </div>
        <!-- END: MAIN CONTAINER -->
        <!-- //BOTTOM SPOTLIGHT -->
        <!-- //BOTTOM SPOTLIGHT -->
    </div>

@endsection