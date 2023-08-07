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
    <title>Брэнды</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
@include('includes.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Брэнды') }}</div>

                <div class="card-body">
                    <!-- Форма для отправки фильтров -->
                    <form action="{{ route('brand.store') }}" method="POST" class="mb-4">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-4 mb-2">
                                <input type="text" class="form-control" id="id" name="id" placeholder="{{ __('ID') }}">
                            </div>
                            <div class="col-sm-4 mb-2">
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="{{ __('Название') }}">
                            </div>
                            <div class="col-sm-4 mb-2">
                                <button type="submit" class="btn btn-primary w-100">{{ __('Поиск') }}</button>
                            </div>
                        </div>
                    </form>

                    <!-- Таблица с данными -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Название') }}</th>
                            <th>{{ __('Действие') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands['data'] as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['title'] }}</td>
                                <td>
                                    <form action="{{ route('brand.destroy', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Удалить') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Кнопка для добавления -->
                    <div class="text-center mt-4">
                        <a href="{{ route('brand.store.page') }}" class="btn btn-primary">{{ __('Добавить брэнд') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
</body>
