@extends($frontend_layout)


@section('sidebar')
@stop

@section('content')
    <div class="col-sm-3">


        @include('partials.userMenu')
        @yield('userMenu')

    </div>

    <div class="col-sm-9 padding-right">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 " align="center"><img alt="User Pic"
                                                                        src="{{ $user->photo == '' ? asset('images/404/404.png') : $user->photo }}"
                                                                        class="img-circle img-responsive"></div>


                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>ФИО:</td>
                                <td>{{$user->fio}}</td>
                            </tr>
                            <tr>
                                <td>Зарегистрирован с:</td>
                                <td> {{$user->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Дата рождения: </td>
                                <td>{{$user->birth}}</td>
                            </tr>

                            <tr>
                            <tr>
                                <td>Получает ли новости проекта:</td>
                                <td> {{ $user->get_news ? 'получает' : 'не получает' }}</td>
                            </tr>
                            <tr>
                                <td>Адрес:</td>
                                <td>{{$user->address}}</td>
                            </tr>
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

                        <a href="#" class="btn btn-primary">История покупок</a>
                        <a href="#" class="btn btn-primary">Team Sales Performance</a>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button"
                   class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Редактировать пользователя" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Удалить пользователя" data-toggle="tooltip" type="button"
                               class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
            </div>

        </div>
        <!--features_items-->
    </div>



@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop
