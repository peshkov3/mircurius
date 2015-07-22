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
            <h2 class="title text-center"> {!! $root_category->name !!}</h2>

            <div class="row">
                <div class="col-lg-6 col-sm-6 col-sx-12">
                    <div class="search_box pull-left">
                        <form action="{{url('category/search')}}" method="GET">
                            <input type="text" name="query" placeholder="Поиск категории">
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-sx-12">
                    <div class="pull-right">

                        {!! $categories->appends(['id' =>$root_category->id ])->render(new
                        App\Mircurius\Presenters\CategoryPaginationPresenter($categories)) !!}

                    </div>

                </div>
            </div>


            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($categories as $category)
                        <li><a href="{{url('product-by-category-id',$category->id)}}">{!! $category->name !!}</a></li>
                        <li class="pull-right"><a href="https://github.com/bbilginn/bootstrap-duallist"
                                         $user->photo         target="_blank"></a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <!--features_items-->
    </div>



@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop
