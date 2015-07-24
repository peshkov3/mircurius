@extends($frontend_layout)


@section('style')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker.min.css"
          rel="stylesheet">
@stop

@section('sidebar')
@stop

@section('content')
    <div class="col-sm-3">


        @include('partials.userMenu')
        @yield('userMenu')

    </div>


    <div class="col-sm-9 padding-right">

        @if (count($errors) > 0)

            <div class="alert alert-danger">
                <strong>Ой!</strong> Вы некорректно заполнили поля авторизации.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">

                    <div class="col-md-3 col-lg-3 " align="center">
                        <img alt="User Pic"
                             src="{{ $user->photo == '' ? asset('images/404/404.png') : asset($user->photo ) }}"
                             class="img-circle img-responsive">


                    </div>

                    {!! Form::model($user, ['method' => 'POST', "enctype"=>"multipart/form-data"]) !!}


                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>Логин</td>
                                <td> {!! Form::text('name',null, ['placeholder' => 'Петров Николай',
                                    "class"=>"form-control"]) !!}
                                </td>
                            </tr>

                            <tr>
                                <td>ФИО</td>
                                <td> {!! Form::text('fio',null, ['placeholder' => 'Петров Николай',
                                    "class"=>"form-control"]) !!}
                                </td>
                            </tr>

                            <tr>
                                <td>Дата рождения</td>
                                <td>
                                    {!!Form::text('birth', $user->birth=='0000-00-00 00:00:00'?'':$user->birth ,[
                                    "id"=>"birth", "class"=>"form-control"])!!}
                                </td>
                            </tr>

                            <tr>
                            <tr>
                                <td>Получает ли новости проекта</td>
                                <td> {!! Form::checkbox('get_news',null, ['placeholder' => 'Email',
                                    "class"=>"form-control"]) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Адрес:</td>
                                <td>{!! Form::text('address',null, ['placeholder' => 'Казахстан г. Астана у. Затаевича
                                    ', "class"=>"form-control"]) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> {!! Form::email('email',null, ['placeholder' => 'Email', "class"=>"form-control"])
                                    !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Номер телефона</td>
                                <td>{!! Form::number('phone',null, ['placeholder' => '+77064556256',
                                    "class"=>"form-control"]) !!}
                                </td>
                            </tr>
                            <tr>
                                <td>Фото</td>
                                <td> {!! Form::file('photo',null, ['title' => 'Аватар', "class"=>"form-control"]) !!}
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        {!! Form::submit('Сохранить' , ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        <!--features_items-->
    </div>



@stop

@section('script')
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.js"></script>

    <script>
        $('#birth').datepicker({});
    </script>

@stop
