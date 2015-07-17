@extends($frontend_layout)

@section('content')

    <div class="col-sm-12 col-lg-12">
        <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="col-sm-12 col-lg-12">
                            <div class="alert alert-danger">
                                <strong>Ой!</strong> Вы некорректно заполнили поля авторизации.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            @if(isset($model))
                                {!! Form::model($model, ['method' => 'POST']) !!}
                            @else
                                {!! Form::open( ['method' => 'POST']) !!}
                            @endif

                            {!! Form::email('email',null, ['placeholder' => 'Email']) !!}
                            {!! Form::password('password', ['placeholder' => 'Password']) !!}

							<span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>

                            {!! Form::submit('Login' , ['class' => 'btn btn-default']) !!}
                            {!! Form::close() !!}
                        </div>
                        <!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form"><!--sign up form-->
                            <h2>New User Signup!</h2>
                            @if(isset($model))
                                {!! Form::model($model,  ['method' => 'POST']) !!}
                            @else
                                {!! Form::open(['method' => 'POST', 'action' => 'Auth\AuthController@postRegister']) !!}
                            @endif

                            {!! Form::text('name', null, ['placeholder' => 'Name']) !!}

                            {!! Form::email('email',null, ['placeholder' => 'Email']) !!}

                            {!! Form::password('password', ['placeholder' => 'Password']) !!}

                            {!! Form::password('password_confirmation', ['placeholder' => 'Password confirmation']) !!}

                            {!! Form::submit('Signup' , ['class' => 'btn btn-default']) !!}

                            {!! Form::close() !!}
                        </div>
                        <!--/sign up form-->
                    </div>
                </div>
            </div>

        </section>
        <!--/form-->

    </div>
@stop

@section('script')
    <script src="{!! asset('js/main.js') !!}"></script>

@stop

