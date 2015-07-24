@extends($frontend_layout)


@section('sidebar')
@stop

@section('content')


    <div class="col-sm-12">
        <h2>Менеджер {{$user->fio?$user->fio:$user->name}}</h2>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                        src="{{ $user->photo == '' ? asset('images/404/404.png') : asset($user->photo ) }}"
                                                                        class="img-circle img-responsive"></div>


                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>

                            <tr>
                                <td>ФИО:</td>
                                <td>{{$user->fio}}</td>
                            </tr>



                            <tr>

                            <tr>
                                <td>Email</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            <td>Номер телефона:</td>
                            <td>{{$user->phone_number}}
                            </td>

                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!--features_items-->
    </div>



@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop
