@extends($frontend_layout)


@section('sidebar')
@stop

@section('content')

    <div class="col-sm-3">

        @include('partials.sidebar')
        @yield('sidebar')

    </div>

    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{!!$product->photo[0]['medium'] ? asset(str_replace('small.jpg', 'medium.jpg',$product->photo[0]['medium'])) : asset('images/404/404.png') !!}"
                         alt=""/>

                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @if($product->photo)
                            <div class="item active">
                                @foreach($product->photo as  $key=>$photo)
                                    @if($key<=2)
                                      <img style="height:80px; width:80px;"
                                                        src="{{asset(str_replace('small.jpg', 'medium.jpg',$photo['medium']))}}"
                                                        alt="">
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="item active">
                                <a href=""><img
                                            src="{{ asset('images/404/404.png')}}"
                                            alt=""></a>
                            </div>
                        @endif
                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="{{$product->new_type_id ==1 ? asset('images/product-details/new.jpg') :''}}"
                         class="newarrival" alt=""/>

                    <h2>{{$product->name}}</h2>

                    <p>Артикул: {{$product->sid}}</p>
                    <p>Материалы: {{ $product->materials_text }}</p>
                    <p>Остаток на складе: {{ $product->balance_text }}</p>
                    <p>Упаковано в: {{ $product->box_type }}</p>



                    {{--<img src="{{asset('images/product-details/rating.png')}}" alt=""/>--}}
                    <span>
									<span> Цена: {{round($product->price*1.2)}} тг.</span>
									{{--<label>Quantity:</label>--}}
									{{--<input type="text" value="3"/>--}}

											<a href="{{route('order.index')}}" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Заказать
                                            </a>
								</span>

                    <p>Описание: {!! $product->description!!}</p>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->

        {{--<div class="category-tab shop-details-tab"><!--category-tab-->--}}
        {{--<div class="col-sm-12">--}}
        {{--<ul class="nav nav-tabs">--}}
        {{--<li><a href="#details" data-toggle="tab">Details</a></li>--}}
        {{--<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>--}}
        {{--<li><a href="#tag" data-toggle="tab">Tag</a></li>--}}
        {{--<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="tab-content">--}}
        {{--<div class="tab-pane fade" id="details">--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery1.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery2.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery3.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery4.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="tab-pane fade" id="companyprofile">--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery1.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery3.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery2.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery4.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="tab-pane fade" id="tag">--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery1.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery2.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery3.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-3">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/gallery4.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="tab-pane fade active in" id="reviews">--}}
        {{--<div class="col-sm-12">--}}
        {{--<ul>--}}
        {{--<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>--}}
        {{--<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>--}}
        {{--<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>--}}
        {{--</ul>--}}
        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut--}}
        {{--labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco--}}
        {{--laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in--}}
        {{--voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>--}}

        {{--<p><b>Write Your Review</b></p>--}}

        {{--<form action="#">--}}
        {{--<span>--}}
        {{--<input type="text" placeholder="Your Name"/>--}}
        {{--<input type="email" placeholder="Email Address"/>--}}
        {{--</span>--}}
        {{--<textarea name=""></textarea>--}}
        {{--<b>Rating: </b> <img src="images/product-details/rating.png" alt=""/>--}}
        {{--<button type="button" class="btn btn-default pull-right">--}}
        {{--Submit--}}
        {{--</button>--}}
        {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--<!--/category-tab-->--}}

        {{--<div class="recommended_items"><!--recommended_items-->--}}
        {{--<h2 class="title text-center">recommended items</h2>--}}

        {{--<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">--}}
        {{--<div class="carousel-inner">--}}
        {{--<div class="item active">--}}
        {{--<div class="col-sm-4">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/recommend1.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/recommend2.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/recommend3.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="item">--}}
        {{--<div class="col-sm-4">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/recommend1.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/recommend2.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-sm-4">--}}
        {{--<div class="product-image-wrapper">--}}
        {{--<div class="single-products">--}}
        {{--<div class="productinfo text-center">--}}
        {{--<img src="images/home/recommend3.jpg" alt=""/>--}}

        {{--<h2>$56</h2>--}}

        {{--<p>Easy Polo Black Edition</p>--}}
        {{--<button type="button" class="btn btn-default add-to-cart"><i--}}
        {{--class="fa fa-shopping-cart"></i>Add to cart--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">--}}
        {{--<i class="fa fa-angle-left"></i>--}}
        {{--</a>--}}
        {{--<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">--}}
        {{--<i class="fa fa-angle-right"></i>--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!--/recommended_items-->--}}

    </div>

@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop
