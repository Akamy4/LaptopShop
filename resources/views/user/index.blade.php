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
<div class="container">
    @if(isset($_SESSION['success']))
        <div class="alert alert-success">
            {{ $_SESSION['success'] }}
        </div>
            <?php
            unset($_SESSION['success']); ?>
    @endif

</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card p-3">
            <h1>Информация о пользователях</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Почта</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="align-middle">{{ $user->id }}</td>
                        <td class="align-middle">{{ $user->name }}</td>
                        <td class="align-middle">{{ $user->surname }}</td>
                        <td class="align-middle">{{ $user->email }}</td>
                        <td class="align-middle">{{ $user->address }}</td>
                        <td class="align-middle">{{ $user->phone }}</td>
                        <td class="align-middle">{{ $user->role }}</td>
                        <td class="align-middle">
                            <form action="{{ route('user.show', ['id' => $user['id']]) }}" method="GET"
                                  style="display:inline-block;">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-warning">{{ __('Просмотр') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Подключение JavaScript-библиотеки jQuery и Bootstrap 4.5.2 -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-o+RDsa0aLu++PJvFqyfFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+8W6JpW"
        crossorigin="anonymous"></script>
</body>
</html>
