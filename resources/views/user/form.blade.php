@extends($frontend_layout)


@section('style')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
@stop

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

                    {!! Form::model($user, ['method' => 'POST']) !!}
                    <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>ФИО:</td>
                                <td> {!! Form::text('fio',null, ['placeholder' => 'Петров Николай', "class"=>"form-control"]) !!}</td>
                            </tr>

                            <tr>
                                <td>Дата рождения: </td>
                                <td>
                                    {!!Form::text('birth', $user->birth=='0000-00-00 00:00:00'?'':$user->birth ,[ "id"=>"birth",  "class"=>"form-control"])!!}
                                </td>
                            </tr>

                            <tr>
                            <tr>
                                <td>Получает ли новости проекта:</td>
                                <td>  {!! Form::checkbox('get_news',null, ['placeholder' => 'Email', "class"=>"form-control"]) !!} </td>
                            </tr>
                            <tr>
                                <td>Адрес:</td>
                                <td>{!! Form::text('address',null, ['placeholder' => 'Казахстан г. Астана у. Затаевича ', "class"=>"form-control"]) !!}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> {!! Form::email('email',null, ['placeholder' => 'Email', "class"=>"form-control"]) !!}</td>
                            </tr>
                            <td>Номер телефона:</td>
                            <td>{!! Form::number('phone',null, ['placeholder' => '+77064556256', "class"=>"form-control"]) !!}
                            </td>

                            </tr>

                            </tbody>
                        </table>

                        {!! Form::submit('Сохранить' , ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
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
    @parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.js"></script>

    <script>
        $('#birth').datepicker({});
    </script>

@stop
