<?php
session_start();
if($_SESSION){
    redirect('/');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Авторизация</h3>
                </div>
                @if(isset($_SESSION['error']))
                    <div class="alert alert-danger">
                        {{ $_SESSION['error'] }}
                    </div>
                        <?php unset($_SESSION['error']); ?>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('users.authorize') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Почта</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
		                                <strong>{{ $errors->first('email') }}</strong>
		                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
		                                <strong>{{ $errors->first('password') }}</strong>
		                            </span>
                            @endif
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Запомнить меня</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Войти</button>


                            <a class="btn btn-link" href="{{ route('register') }}">
                                Зарегистрироваться
                            </a>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
