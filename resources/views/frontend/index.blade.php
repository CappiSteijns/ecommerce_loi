<!-- Hier tonen we de index pagina van de frontend. -->
@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                <div class="side-menu animate-dropdown outer-bottom-xs">
                    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                    <nav class="yamm megamenu-horizontal">
                        <ul class="nav">

                            @foreach($categories as $category)
                            <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
                                    data-toggle="dropdown"><i class="icon {{ $category->category_icon }}"
                                        aria-hidden="true"></i>{{ $category->category_name_en }}
                                </a>
                                <ul class="dropdown-menu mega-menu">
                                    <li class="yamm-content">
                                        <div class="row">
                                            <!--   // Get SubCategory Table Data -->
                                            @php
                                            $subcategories = App\Models\SubCategory::where('category_id',
                                            $category->id)
                                            ->orderBy('subcategory_name_en', 'ASC')->get();
                                            @endphp

                                            @foreach($subcategories as $subcategory)
                                            <div class="col-sm-12 col-md-3">
                                                <a
                                                    href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en ) }}">
                                                    <h2 class="title">{{ $subcategory->subcategory_name_en }}
                                                    </h2>
                                                </a>

                                                <!--   // Get SubSubCategory Table Data -->
                                                @php
                                                $subsubcategories =
                                                App\Models\SubSubCategory::where('subcategory_id',
                                                $subcategory->id)
                                                ->orderBy('subsubcategory_name_en', 'ASC')->get();
                                                @endphp

                                                @foreach($subsubcategories as $subsubcategory)
                                                <ul class="links list-unstyled">
                                                    <li><a
                                                            href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_name_en ) }}">
                                                            {{ $subsubcategory->subsubcategory_name_en }}</a>
                                                    </li>

                                                </ul>
                                                @endforeach
                                            </div>
                                            @endforeach
                                            <!--   // End SubCategory Table Data -->
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- /.yamm-content -->
                                </ul>
                                <!-- /.dropdown-menu -->
                            </li>
                            <!-- /.menu-item -->
                            @endforeach

                            

                            
                            <!-- /.menu-item -->

                        </ul>
                        <!-- /.nav -->
                    </nav>
                    <!-- /.megamenu-horizontal -->
                </div>
                <!-- /.side-menu -->
                <!-- ================================== TOP NAVIGATION : END ================================== -->

                <!-- ============================================== HOT DEALS ============================================== -->

                <!-- ============================================== HOT DEALS: END ============================================== -->

                <!-- ============================================== SPECIAL OFFER ============================================== -->


                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                <!-- ============================================== PRODUCT TAGS ============================================== -->

                <!-- /.sidebar-widget -->
                <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                <!-- ============================================== SPECIAL DEALS ============================================== -->


                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                <!-- ============================================== NEWSLETTER ============================================== -->

                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                <!-- ============================================== Testimonials============================================== -->


                <!-- ============================================== Testimonials: END ============================================== -->


            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- === ========= SECTION – HERO ==== ======= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                        @foreach($sliders as $slider)
                        <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">

                                    <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span>
                                    </div>
                                    <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product"
                                            class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                    </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        <!-- /.item -->
                        @endforeach


                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ==== ===== SECTION – HERO : END === ============== -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">money back</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">30 Days Money Back Guarantee</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">free shipping</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Shipping on orders over $99</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-4 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h4 class="info-box-heading green">Special Sale</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Extra $5 off on all items </h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- = =================================================== SCROLL TABS =============== ========== -->

                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">New Products</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
                            </li>

                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                    data-toggle="tab">{{ $category->category_name_en }}</a></li>
                            @endforeach
                            <!-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>

              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">



                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                                src="{{ asset($product->product_thambnail) }}"
                                                                alt=""></a> </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                            {{ $product->product_name_en }}
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->discount_price == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            €{{ $product->selling_price }} </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            €{{ $product->discount_price }} </span> <span
                                                            class="price-before-discount">€
                                                            {{ $product->selling_price }}</span> </div>
                                                    @endif


                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">


                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Add Cart" data-toggle="modal"
                                                                    data-target="#exampleModal" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>

                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Add to cart</button>
                                                            </li>



                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>

                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart" href="detail.html"
                                                                    title="Compare"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @endforeach
                                    <!--  // end all optionproduct foreach  -->




                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->




                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @php
                                    $catwiseProduct =
                                    App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp


                                    @forelse($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                                                src="{{ asset($product->product_thambnail) }}"
                                                                alt=""></a> </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->discount_price == NULL)
                                                        <div class="tag new"><span>new</span></div>
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                            {{ $product->product_name_en }}
                                                        </a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->discount_price == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            €{{ $product->selling_price }} </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            €{{ $product->discount_price }} </span> <span
                                                            class="price-before-discount">€
                                                            {{ $product->selling_price }}</span> </div>
                                                    @endif


                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">

                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Add Cart" data-toggle="modal"
                                                                    data-target="#exampleModal" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>

                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Add to cart</button>
                                                            </li>



                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>


                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart" href="detail.html"
                                                                    title="Compare"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->

                                    @empty
                                    <h5 class="text-danger">No Product Found</h5>

                                    @endforelse
                                    <!--  // end all optionproduct foreach  -->




                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @endforeach
                        <!-- end categor foreach -->





                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->

                <!-- Newsletter Section -->
                <div id="newsletter-section" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix">
                        <h3 class="new-product-title pull-left">Subscribe to our Newsletter</h3>
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active">
                            <div class="newsletter-box">
                                <p>Get all the latest information on Events, Sales, and Offers. Sign up for the
                                    newsletter today.</p>
                                <form role="form" class="newsletter-inner" id="newsletter-validate-detail" method="post"
                                    action="#">
                                    <div class="form-group">
                                        <label class="sr-only" for="newsletter">Email address</label>
                                        <input type="text" id="newsletter" class="form-control"
                                            placeholder="Your email address">
                                        <br>
                                        <button class="btn btn-primary">Subscribe</button>
                                        <br>
                                    </div>
                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->

                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->


                <!-- ============================================== BEST SELLER ============================================== -->


                <!-- /.sidebar-widget -->
                <!-- ============================================== BEST SELLER : END ============================================== -->

                <!-- ============================================== BLOG SLIDER ============================================== -->

                <!-- /.section -->
                <!-- ============================================== BLOG SLIDER : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->

                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
@endsection