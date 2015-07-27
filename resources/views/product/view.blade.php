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

								</span>


                    @if( Auth::check())
                        <span>


                            <form id="order_form" action="{{url('order/make')}}">

                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id}}">
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product->id}}">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" value="1" />

                            <button id="order" type="submit" class="btn btn-default cart">
                                <i class="fa fa-shopping-cart"></i>
                                Заказать
                            </button>
                        </form>

                        </span>
                    @endif

                    <p>Описание: {!! $product->description!!}</p>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->

    </div>

@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

    <script>


        $("#order_form").submit(function(e)
        {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax(
                    {
                        url : formURL,
                        type: "POST",
                        data : postData,
                        success:function(data, textStatus, jqXHR)
                        {
                            alert('alert ' + data);
                        },
                        error: function(jqXHR, textStatus, errorThrown)
                        {
                            //if fails
                        }
                    });
            e.preventDefault(); //STOP default action
            e.unbind(); //unbind. to stop multiple form submit.
        });


    </script>

@stop
