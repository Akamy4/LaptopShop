<?php

session_start();
if (empty($_SESSION['role'])) {
    $url = \Illuminate\Support\Facades\URL::route('home');
    header("Location: $url");
    exit();
}
?>

    <!DOCTYPE html>
<html>
<head>
    <title>Пользователи</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
@include('includes.header')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Редактировать</div>
                    <form action="{{ route('user.destroy', ['id' => $user['id']]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-auto">{{ __('Удалить') }}</button>
                    </form>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', ['id' => $user['id']]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Имя <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"
                                       name="name" value="{{$user->name}}" required autocomplete="name"
                                       autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Фамилия <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control"
                                       name="surname" value="{{$user->surname}}" required autocomplete="surname"
                                       autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Почта <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control"
                                       name="email" value="{{ $user->email }}" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Пароль <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"
                                       name="password" required autocomplete="password" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Адрес <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control"
                                       name="address" value="{{ $user->address }}" required autocomplete="address"
                                       autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control"
                                       name="phone" value="{{ $user->phone }}" required>
                            </div>
                        </div>
                        <div style="width: 100%;">
                            <div class="col-md-6 offset-md-4">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">
                                    Редактировать
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
