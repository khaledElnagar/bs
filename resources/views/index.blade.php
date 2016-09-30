@extends('layouts.app')
@section('content')
        <!-- TOP SPOTLIGHT -->
<div id="jm-tops1" class="wrap clearfix">
    <div class="main col2-set">
        <div class="inner clearfix">
            <div class="block-slideshow col-1">

                <script type="text/javascript">
                    (function ($) {
                        $(document).ready(function ($) {
                            $('#jm-slide-57a5b7b455fc1').jmSlider({
                                animation: 'fade', 						//[slide, fade, slice], slide and fade for old compactible
                                interval: 5000,								//interval - time for between animation
                                duration: 500,								//duration - time for animation
                                repeat: 1,								//animation repeat or not
                                autoPlay: 1,							//auto play
                                mainWidth: 818,								//width of main item
                                mainHeight: 378,							//height of main item
                                rtl: null,									//rtl
                                thumbType: '', 						//false - no thumb, other [number, thumb], thumb will animate
                                thumbItems: 4,								//number of thumb item will be show
                                thumbWidth: 60,								//width of thumbnail item
                                thumbHeight: 60,							//width of thumbnail item
                                thumbSpaces: [3, 3, 3, 3],					//space between thumbnails
                                thumbTrigger: 'click',						//thumb trigger event, [click, mouseenter]
                                thumbDirection: 'horizontal',				//thumb orientation
                                thumbPosition: 'br',						//[0%, 50%, 100%]
                                showThumbDesc: '',
                                showDesc: 'desc',								//show description or not
                                descTrigger: 'always',						//[always, mouseover, load]
                                maskAnim: 'fade',						//mask transition style [fade, slide, slide-fade], slide - will use the maskAlign to slide
                                maskWidth: 300,								//mask - a div over the the main item - used to hold descriptions
                                maskHeight: 200,							//mask height
                                maskOpacity: 0.8,							//mask opacity
                                maskPosition: 'bl',						//[0%, 50%, 100%]
                                controlBox: 0,							//show navigation controller [next, prev, play, playback] - JM does not have a config
                                controlPosition: 'tr',							//show navigation controller [next, prev, play, playback] - JM does not have a config
                                navButtons: '1',							//main next/prev navigation buttons mode, [false, auto, fillspace]
                                showProgress: 1,							//show the progress bar
                                urls: ['books.html', ''], 								// [] array of url of main items
                                targets: ['_self', '_self'] // [] same as urls, an array of target value such as, '_blank', 'parent', '' - default
                            });
                        });
                    })(jQuery);
                </script>

                <div class="block jm-slideshow jm-slideshow-horizontal">
                    <div class="jm-slidewrap" id="jm-slide-57a5b7b455fc1" style="visibility:hidden;">
                        <div class="jm-slide-main-wrap">
                            <div class="jm-slide-main">
                                @foreach($slider as $image)
                                    <div class="jm-slide-item"><img
                                                src="{{asset('')}}images/slides/{{$image->image}}"
                                                alt="{{$image->title}}"
                                                width="818" height="378"/></div>
                                @endforeach
                            </div>
                            <div class="jm-slide-loader"></div>
                            <div class="jm-slide-progress"></div>
                            <div class="jm-slide-buttons clearfix">
                                <span class="jm-slide-prev"><i class="icon-chevron-left"></i></span>
                                <span class="jm-slide-next"><i class="icon-chevron-right"></i></span>
                            </div>
                        </div>


                        <div class="jm-mask-desc">
                            <div class="jm-slide-desc"></div>
                            <div class="jm-slide-mask"></div>
                        </div>

                        <div class="jm-slide-descs">
                            @foreach($slider as $image)
                                <div class="jm-slide-desc">
                                    <span class="title">{{$image->title}}</span><span
                                            class="desc">{{$image->description}}</span>
                                    @if($image->link !='')

                                        <div class="readmore"><a title="{{$image->title}}" class="readon"
                                                                 href="{{$image->link}}"
                                                                 target="_blank">View more</a>
                                        </div>
                                    @endif

                                </div>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
            <div class="block block-top-book col-2">
                <div class="str">
                    <div class="jm-product-list latest clearfix">
                        <div class="listing-type-list category-products">

                            <div class="jm-products-list-title">
                                <h2>Today highlight</h2>
                            </div>
                            <div class="products-list">

                                <div class="item top-product">
                                    <div class="item-inner">

                                        <p class="product-images">
                                            <a title="{{$highlighted_book->name}}"
                                               href="{{url('')}}/book/{{$highlighted_book->id}}">
                                                <img class="lazy"
                                                     data-original="{{asset('storage/app/public/images/thumbnail/170x250')}}/{{$highlighted_book->image}}"
                                                     alt="{{$highlighted_book->name}}" width="80" height="120"/>
                                            </a>
                                        </p>

                                        <h2 class="product-name">
                                            <a title="{{$highlighted_book->name}}"
                                               href="{{url('')}}/book/{{$highlighted_book->id}}">
                                                {{$highlighted_book->name}} </a>
                                        </h2>

                                        <div class="author">
                                            {{$highlighted_book->author}}
                                        </div>
                                        <div class="price-box">
                                                                <span class="regular-price"
                                                                      id="product-price-22_jmproduct">
                                            <span class="price">£{{number_format($highlighted_book->price,2,'.','')}}</span>                                    </span>

                                        </div>

                                        <div class="author" style="font-size:14px !important;">
                                            {!!str_limit($highlighted_book->description,260)!!}
                                        </div>


                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //TOP SPOTLIGHT -->

<!-- //TOP SPOTLIGHT 2 -->
<div id="jm-tops2" class="jm-position wrap clearfix">
    <div class="main col1-set">
        <div class="inner clearfix">
            <script type="text/javascript">
                jQuery.noConflict();

                var JmTabs = {
                    init: function () {
                        jQuery(".jm-tabs-title .tab").click(function () {
                            ind = jQuery(this).parent().parent().prevAll().size();

                            jQuery(".jm-tabs-title li").removeClass("first active");
                            jQuery(".jm-tabs-title li:eq(" + ind + ")").addClass("first active");

                            JmTabs.tabContent(jQuery(this));
                            jQuery(this).trigger("tabclick");
                        });
                        //active the first tab
                        jQuery(window).load (function () {
                            JmTabs.tabContent(jQuery(".jm-tabs-title .tab:first"))
                        });
                    },

                    tabContent: function (obj) {
                        ind = jQuery(obj).parent().parent().prevAll().size();

                        jQuery("#myTabs-57a70758690f9 .jm-tab-panels-top .jm-tab-content").hide();
                        jQuery("#myTabs-57a70758690f9 .jm-tab-panels-top .jm-tab-content:eq(" + ind + ")").fadeIn("");


                        //resize the height of the sub-panel
                        var panelheight = 370 + 'px';


                        setTimeout(function () {

                            if (!panelheight) {
                                var panelheight = (jQuery("#myTabs-57a70758690f9 .jm-tab-panels-top .jm-tab-content:eq(" + ind + ")").height()) + 'px';
                            }

                            jQuery('#myTabs-57a70758690f9 .jm-tab-panels-top').animate({'height': panelheight}, {
                                queue: false,
                                duration: 1000
                            });
                        });

                    }
                }

                jQuery(document).ready(function () {
                    jQuery(".jm-tabs-title li:eq(0)").addClass("first active");

                    var panelwidth = jQuery("#myTabs-57a70758690f9 .tabs_content").width();

                    //alert(margin);

                    //Get the height of the sub-panel
                    var panelheight = 370;
                    //jQuery(".jm-tab-content").css({"height":panelheight+"px",});


                    setTimeout(function () {
                        jQuery('#myTabs-57a70758690f9 .jm-tab-panels-top').css({'height': panelheight + 'px'});
                    });
                    JmTabs.init();
                });
            </script>

            <div class="box jm-tabs">
                <div>
                    <div class="jm-tabswrap jm-animation-fadeIn blank">
                        <div id="myTabs-57a70758690f9" class="container">
                            <div class="jm-tabs-title-top" style="width:1170px">
                                <ul class="jm-tabs-title">
                                    <li><h3><span class="tab">Most Viewed Books</span></h3></li>
                                    <li style=""><h3><span class="tab">Special Books</span></h3>
                                    </li>
                                </ul>
                            </div>
                            <div class="tabs_content" style="overflow:hidden;width:1170px;height:370px">
                                <div class="jm-tab-panels-top" style="height: auto;">

                                    <div class="jm-tab-content" style="float: left;width:1170px">
                                        <div id="jm-tab-1" class="jm-tab-subcontent">
                                            <div class="home-slider">


                                                <script type="text/javascript"
                                                        src="{{asset('')}}css/default/jm_book/joomlart/jmproductsslider/js/jcarousellite_1.0.1_custom.js"></script>


                                                <script type="text/javascript">
                                                    jQuery.noConflict();
                                                    jQuery(document).ready(function ($) {
                                                        $("#jm-contain-89749667816175386541470490538").jCarouselLite({
                                                            auto: 3000,
                                                            speed: 2000,
                                                            visible: 6,
                                                            btnNext: "#jmmainwrap-jm-contain-89749667816175386541470490538 .jm-next",
                                                            btnPrev: "#jmmainwrap-jm-contain-89749667816175386541470490538 .jm-prev",
                                                            width: 1080,
                                                            width_img: 170
                                                        });
                                                    });


                                                </script>

                                                <div class="block jm-products-slider-listing"
                                                     id="jmmainwrap-jm-contain-89749667816175386541470490538">
                                                    <div class="block-title">
                                                        <strong><span>Most Viewed Books </span></strong>

                                                        <div class="jm-prev">
                                                            <i class="icon-caret-left"></i>
                                                        </div>
                                                        <div class="jm-next">
                                                            <i class="icon-caret-right"></i>
                                                        </div>
                                                    </div>


                                                    <div class="jm-products-slider-content clearfix block-content jm-products-slider-content122579379715544236941470490538">


                                                        <div id="jm-contain-89749667816175386541470490538"
                                                             class="jm-slider"
                                                             style="overflow: hidden; width: 2040px; float: left; left: 0 !important;">

                                                            <ul class="jm-slider-ul products-grid">
                                                                @foreach($most_view_books as $most_view_book)
                                                                    <li class="jm-slider-li item"
                                                                        style="float: left;width:170px;height:370px">
                                                                        <div class="item-slider">
                                                                            <div class="product-image">
                                                                                <a class="product-img"
                                                                                   title="{{$most_view_book->name}}"
                                                                                   href="{{url('')}}/book/{{$most_view_book->id}}">
                                                                                    @if($most_view_book->image !='')
                                                                                        <img
                                                                                                src="{{asset('storage/app/public/images/thumbnail/170x250')}}/{{$most_view_book->image}}"
                                                                                                alt="{{$most_view_book->name}}"/>
                                                                                    @else
                                                                                        <img
                                                                                                src="{{asset('storage/app/public/images/thumbnail/170x250')}}/noimage.gif"
                                                                                                alt="{{$most_view_book->name}}"/>

                                                                                    @endif
                                                                                    <span class="actions">
																						<button class="form-button btn-cart"
                                                                                                onclick="setLocation('proin-nec-nisl.html')">
                                                                                            <span class="icon-shopping-cart"></span>
                                                                                        </button>
                                                                                    </span>
                                                                                </a>

                                                                                <div class="actions">
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-name">
                                                                                <a class="product-title"
                                                                                   title="{{$most_view_book->name}}"
                                                                                   href="{{url('')}}/book/{{$most_view_book->id}}">
                                                                                    {{str_limit($most_view_book->name,35)}} </a>
                                                                            </div>
                                                                            <div class="author">
                                                                                {{$most_view_book->author}}
                                                                            </div>

                                                                            <div class="price-box">
                                                                <span class="regular-price"
                                                                      id="product-price-22_jmslider">
                                            <span class="price">£{{number_format($most_view_book->price,2,'.','')}}</span>                                    </span>

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

                                    <div class="jm-tab-content" style="float: left;width:1170px">
                                        <div id="jm-tab-2" class="jm-tab-subcontent">
                                            <div class="home-slider">


                                                <script type="text/javascript">
                                                    jQuery.noConflict();
                                                    jQuery(document).ready(function ($) {
                                                        $("#jm-contain-18057889639206724381470490538").jCarouselLite({
                                                            auto: 3000,
                                                            speed: 2000,
                                                            visible: 6,
                                                            btnNext: "#jmmainwrap-jm-contain-18057889639206724381470490538 .jm-next",
                                                            btnPrev: "#jmmainwrap-jm-contain-18057889639206724381470490538 .jm-prev",
                                                            width: 1080,
                                                            width_img: 170
                                                        });
                                                    });


                                                </script>

                                                <div class="block jm-products-slider-listing"
                                                     id="jmmainwrap-jm-contain-18057889639206724381470490538">
                                                    <div class="block-title">
                                                        <strong><span>Special Books </span></strong>

                                                        <div class="jm-prev">
                                                            <i class="icon-caret-left"></i>
                                                        </div>
                                                        <div class="jm-next">
                                                            <i class="icon-caret-right"></i>
                                                        </div>
                                                    </div>


                                                    <div class="jm-products-slider-content clearfix block-content jm-products-slider-content174563771012261245161470490538">


                                                        <div id="jm-contain-18057889639206724381470490538"
                                                             class="jm-slider"
                                                             style="overflow: hidden; width: 2040px; float: left; left: 0 !important;">

                                                            <ul class="jm-slider-ul products-grid">
                                                                @foreach($special_books as $special_book)
                                                                    <li class="jm-slider-li item"
                                                                        style="float: left;width:170px;height:370px">
                                                                        <div class="item-slider">
                                                                            <div class="product-image">
                                                                                <a class="product-img"
                                                                                   title="{{$special_book->name}}"
                                                                                   href="{{url('')}}/book/{{$special_book->id}}">
                                                                                    @if($special_book->image !='')
                                                                                        <img
                                                                                                src="{{asset('storage/app/public/images/thumbnail/170x250')}}/{{$special_book->image}}"
                                                                                                alt="{{$special_book->name}}"/>
                                                                                    @else
                                                                                        <img
                                                                                                src="{{asset('storage/app/public/images/thumbnail/170x250')}}/noimage.gif"
                                                                                                alt="{{$special_book->name}}"/>

                                                                                    @endif
                                                                                    <span class="actions">
																						<button class="form-button btn-cart"
                                                                                                onclick="setLocation('proin-nec-nisl.html')">
                                                                                            <span class="icon-shopping-cart"></span>
                                                                                        </button>
                                                                                    </span>
                                                                                </a>

                                                                                <div class="actions">
                                                                                </div>
                                                                            </div>
                                                                            <div class="product-name">
                                                                                <a class="product-title"
                                                                                   title="{{$special_book->name}}"
                                                                                   href="{{url('')}}/book/{{$special_book->id}}">
                                                                                    {{str_limit($special_book->name,35)}}</a>
                                                                            </div>
                                                                            <div class="author">
                                                                                {{$special_book->author}}
                                                                            </div>

                                                                            <div class="price-box">
                                                                <span class="regular-price"
                                                                      id="product-price-22_jmslider">
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

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //TOP SPOTLIGHT 2 -->
<div id="jm-container" class="jm-lo-2colsl jm-col-left not-breadcrumbs wrap clearfix" style="margin-top: 50px;margin-bottom:50px;">
    <div class="main clearfix">
        <div id="jm-mainbody" class="clearfix">
            <!-- BEGIN: CONTENT -->
            <div id="jm-main">
                <div class="inner minner clearfix">
                    <div id="jm-current-content" class="clearfix">
                        <!-- MASS Head -->
                        <!-- primary content -->
                        <div class="std">
                            <div class="home-product-list">

                                <div class="jm-product-list latest clearfix">
                                    <div class="page-title category-title">
                                        <h1>New Products</h1>
                                    </div>

                                    <div class="listing-type-grid category-products">


                                        <ul class="products-grid" id="productsgrid">
                                            <?php $counter = 1; ?>
                                            @foreach($new_books as $new_book)
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
                                                                <a title="{{$new_book->name}}"
                                                                   href="{{url('')}}/book/{{$new_book->id}}">
                                                                    @if($new_book->image !='')
                                                                        <img class="lazy"
                                                                             data-original="{{asset('storage/app/public/images/thumbnail/146x219')}}/{{$new_book->image}}"
                                                                             alt="{{$new_book->name}}"/>
                                                                    @else
                                                                        <img class="lazy"
                                                                             data-original="{{asset('storage/app/public/images/thumbnail/146x219')}}/noimage.gif"
                                                                             alt="no-image"/>
                                                                    @endif
                                                                    <span class="actions">
																						<button class="form-button btn-cart"
                                                                                                onclick="setLocation('proin-nec-nisl.html')">
                                                                                            <span class="icon-shopping-cart"></span>
                                                                                        </button>
																					</span>
                                                                </a>
                                                            </div>
                                                            <div class="product-information">

                                                                <h5 class="product-name">
                                                                    <a title="{{$new_book->name}}"
                                                                       href="{{url('')}}/book/{{$new_book->id}}">
                                                                        {{str_limit($new_book->name,35)}} </a>
                                                                </h5>

                                                                <div class="author">{{$new_book->author}}</div>

                                                                <div class="price-box">
                                                                <span class="regular-price"
                                                                      id="product-price-22_jmproduct_1329326864">
                                            <span class="price">£{{number_format($new_book->price,2,'.','')}}</span>                                    </span>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </li>

                                                    @endforeach


                                        </ul>
                                        <script type="text/javascript">decorateGeneric($$('ul.products-grid'), ['odd', 'even', 'first', 'last'])</script>

                                    </div>
                                </div>
                            </div>
                        </div>                            <!-- // primary content -->
                    </div>
                </div>
            </div>
            <!-- END: CONTENT -->
            <!-- BEGIN: COLUMN 1 -->
            <div id="jm-col1" class="col-left side-col">
                <div class="inner linner clearfix">

                    <div class="block block-layered-nav">
                        <div class="block-title">
                            <strong><span>Browse books</span></strong>
                        </div>
                        <div class="block-content">


                            <p class="block-subtitle">Shopping Options</p>
                            <dl id="narrow-by-list">
                                <dt>Category</dt>
                                <dd>
                                    <ol>
                                        @foreach($categories as $category)
                                            <li>
                                                <a href="{{url('')}}/category/{{$category->id}}">{{$category->name}}</a>
                                            </li>
                                        @endforeach
                                        <li>
                                            <a href="" style="color:#FF0000;"> More Categories >>> </a>
                                        </li>
                                    </ol>
                                </dd>
                            </dl>
                            <script type="text/javascript">decorateDataList('narrow-by-list')</script>
                        </div>
                    </div>


                    <script type="text/javascript">
                        jQuery.noConflict();
                        jQuery(document).ready(function ($) {
                            $(".jm-products-slider-listing #jm-contain-15156727164473171761470490539").jCarouselLite({
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
                         id="jmmainwrap-jm-contain-15156727164473171761470490539">
                        <div class="block-title">
                            <strong><span>Special books</span></strong>
                        </div>
                        <div class="block-content">
                            <div class="control-barslide">
                                <div class="jm-slider-prev"><i class="icon-caret-left"></i></div>
                                <div class="jm-slider-next"><i class="icon-caret-right"></i></div>
                            </div>
                            <div class="jm-products-slider-content clearfix jm-products-slider-content18430603007052020861470490539">
                                <div id="jm-contain-15156727164473171761470490539" class="jm-slider"
                                     style="overflow: hidden; width: 3060px; float: left; left: 0 !important;">
                                    <ul class="jm-slider-ul">
                                        @foreach($special_books as $special_book)

                                            <li class="jm-slider-li" style="float: left;width:255px;height:150px">
                                                <div class="slider-inner">
                                                    <div class="product-image">
                                                        <a title="{{$special_book->name}}" href="{{url('')}}/book/{{$special_book->id}}">
                                                            @if($special_book->image !='')
                                                                <img
                                                                     src="{{asset('storage/app/public/images/thumbnail/80x120')}}/{{$special_book->image}}"
                                                                     alt="{{$special_book->name}}"/>
                                                            @else
                                                                <img
                                                                     src="{{asset('storage/app/public/images/thumbnail/80x120')}}/noimage.gif"
                                                                     alt="{{$special_book->name}}"/>

                                                            @endif
                                                        </a>
                                                    </div>
                                                    <h5>
                                                        <a title="{{$special_book->name}}" href="{{url('')}}/book/{{$special_book->id}}">

                                                            {{$special_book->name}} </a>
                                                    </h5>

                                                    <div class="author">
                                                        {{$special_book->author}}
                                                    </div>


                                                    <div class="price-box">
                                                                <span class="regular-price"
                                                                      id="product-price-22_jmproduct_1810452311">
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

@endsection
