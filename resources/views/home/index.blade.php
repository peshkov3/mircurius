@extends($frontend_layout)


@section('sidebar')
@stop

@section('content')
    <div class="col-sm-3">

        @include('partials.sidebar')
        @yield('sidebar')

    </div>

    <div class="col-sm-9 padding-right">

        <div class="features_items"><!--features_items-->
            <h2 class="title text-center"> Наши продукты </h2>

            <div class="row hidden-lg hidden-md visible-xs visible-sm">


                <div class="col-sm-12 col-sx-10">
                    <div class="pull-right">

                        {!! $products->render(new
                        App\Mircurius\Presenters\CategoryPaginationPresenter($products)) !!}

                    </div>
                </div>


            </div>


            <div class="row visible-lg visible-md hidden-xs hidden-sm">

                <div class="col-lg-2  col-sm-2">
                    <div class="search_box pull-left">
                        <input type="text" placeholder="Поиск категории">
                    </div>
                </div>

                <div class="col-lg-10 col-sm-10 col-sx-12">
                    <div class="pull-right">

                        {!! $products->render(new
                        App\Mircurius\Presenters\CategoryPaginationPresenter($products)) !!}

                    </div>

                </div>
            </div>

            <div class="features_items"><!--features_items-->


                @foreach($products as $product)
                    <div class="col-sm-4" style="height: 460px;">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="{{ route('product.view',$product->id)}}"><img
                                                src="{!!$product->photo[0]['medium'] ? asset($product->photo[0]['medium']) : asset('images/404/404.png') !!}"
                                                alt=""/></a>

                                    <h2>{{$product->price*1.2}} тг.</h2>

                                    <p><a href="{{ route('product.view',$product->id)}}">{!! $product->name !!}</a></p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Заказать</a>
                                </div>
                                {{--<div class="product-overlay">--}}
                                {{--<div class="overlay-content">--}}
                                {{--<h2>{{$product->price*1.2}} тг.</h2>--}}

                                {{--<p><a style="color: white;" href="{{ route('product.view',$product->id)}}">{!! $product->name !!}</a></p>--}}
                                {{--<a href="#" class="btn btn-default add-to-cart"><i--}}
                                {{--class="fa fa-shopping-cart"></i>Заказать</a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                @if($product->has_discount==1)<img src="{{asset('images/home/sale.png')}}" class="new"
                                                                   alt="">
                                @else <span></span>
                                @endif
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--features_items-->


        </div>
        <!--features_items-->
    </div>



@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop
