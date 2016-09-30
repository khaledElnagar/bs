<!-- BEGIN: HEADER -->
<div id="jm-header" class="wrap clearfix">

    <script type="text/javascript">
        jQuery(window).load(function () {
            if (jQuery('#jm-mainbody').children().hasClass("col-left")) {
                jQuery("div#jm-mainbody > div").equalHeight();
            }
            jQuery(".megacol").not(".last").equalHeight();

        })


    </script>
    <div class="main">
        <div class="inner clearfix">
            <a href="{{url('')}}/">
            <h1 id="logo"><img src="{{asset('')}}/images/logo.png" style="padding-top:5px;"></h1></a>

            <p class="no-display"><a href="#main"><strong>Skip to Main Content &raquo;</strong></a></p>

            <div id="mainnav-inner">
                <!-- BEGIN: SITE SEARCH -->
                <div id="jm-search" class="has-toggle">
                    <div class="btn-toggle search-toggle">
                        <i class="icon-search"></i>
                    </div>
                    <div class="inner-toggle">
                        <form id="search_mini_form"
                              action="{{url('')}}/search" method="post">
                            {{csrf_field()}}
                            <div class="form-search">
                                <label for="search">Search:</label>
                                <input id="search" type="text" name="q" value="" class="input-text"
                                       maxlength="128"/>
                                <button type="submit" title="Search" class="icon-search"></button>
                                <div id="search_autocomplete" class="search-autocomplete"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: SITE SEARCH -->
                <!-- BEGIN: NAV -->
                <div id="jm-mainnav" class="has-toggle">
                    <div class="btn-toggle menu-toggle">
                        <i class="icon-reorder">&nbsp;</i>
                    </div>
                    <div class="inner-toggle" id="jm-mainnav-inner">
                        <div id='jm-megamenu-12' class=''>
                            <div class="none jm-megamenu clearfix">
                                <ul class="megamenu level0">
                                    <li class="mega first"><a href="{{url('')}}/" class="mega first"
                                                                     id="menu1" title="Home"><span
                                                    class="menu-title">Home</span></a></li>

                                    <li class="mega "><a href="{{url('')}}/aboutus" class="mega" id="menu5"
                                                        title="Nook books"><span
                                                    class="menu-title">About</span></a></li>

                                    <li class="mega haschild"><a href="" class="mega haschild" id="menu4"
                                                                 title="Books"><span class="menu-title">Book Categories</span></a>

                                        <div class="childcontent cols4 " style="width:250px;">
                                            <div class="childcontent-inner-wrap" id="childcontent4">
                                                <div class="childcontent-inner clearfix" style="width: 565px;">
                                                    <div class="megacol column1 first" style="width: 245px;">
                                                        <ul class="megamenu level1">
                                                            <li class="mega first haschild">
                                                                <div class="group">
                                                                    <div class="group-title"><a
                                                                                href=""
                                                                                class="mega first haschild" id="menu9"
                                                                                title="Categories"><span
                                                                                    class="menu-title">Book Categories</span></a>
                                                                    </div>

                                                                @foreach($menu_categories as $category)
                                                                    <div class="group-content">
                                                                        <ul class="megamenu level2">
                                                                                <li class="mega">
                                                                                <a
                                                                                        href="{{url('')}}/category/{{$category->parent_code}}"
                                                                                        class="mega first" id="menu10"
                                                                                        title="Biography"><span
                                                                                            class="menu-title">{{title_case($category->name)}}</span></a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                        @endforeach
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="mega haschild"><a href="" class="mega haschild" id="menu4"
                                                                 title="Books"><span class="menu-title">Special Books</span></a>

                                        <div class="childcontent cols4 " style="width: 250px; height: auto !important;">
                                            <div class="childcontent-inner-wrap" id="childcontent4">
                                                <div class="childcontent-inner clearfix" style="width: 565px;">
                                                    <div class="megacol column1 first" style="width: 245px;">
                                                        <ul class="megamenu level1">
                                                            <li class="mega first haschild">
                                                                <div class="group">
                                                                    <div class="group-title"><a
                                                                                href=""
                                                                                class="mega first haschild" id="menu9"
                                                                                title="Categories"><span
                                                                                    class="menu-title">Special Books</span></a>
                                                                    </div>

                                                                    @foreach($menu_special as $special)
                                                                        <div class="group-content">
                                                                            <ul class="megamenu level2">
                                                                                <li class="mega">
                                                                                    <a
                                                                                            href="{{url('')}}/book/{{$special->id}}"
                                                                                            class="mega first" id="menu10"
                                                                                            title="Biography"><span
                                                                                                class="menu-title">{{title_case($special->name)}}</span></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mega last"><a href="{{url('')}}/contactus" class="mega last" id="menu8"
                                                             title="Contact Us"><span
                                                    class="menu-title">Contact</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: NAV -->
            </div>

        </div>
    </div>
</div>
<!-- END: HEADER -->
