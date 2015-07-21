


@extends($frontend_layout)

@section('content')
    <div class="row">

        <div class="col-sm-4">
            <div class="contact-info">
                <h2 class="title text-center">Позвонить и заказать</h2>
                <address>
                    <p>Mircurius </p>
                    <p>Казахстан Астана</p>
                    <p>Телефон: +7 747 468 85 63</p>

                    <p>Email: mircurius.kz@mail.ru</p>
                </address>
                {{--<div class="social-networks">--}}
                {{--<h2 class="title text-center">Social Networking</h2>--}}
                {{--<ul>--}}
                {{--<li>--}}
                {{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#"><i class="fa fa-google-plus"></i></a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#"><i class="fa fa-youtube"></i></a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop


