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
    <title>Ноутбуки</title>
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
            <?php unset($_SESSION['success']); ?>
    @endif
</div>
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавить процессор</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('video-card.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Брэнд <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select name="brandId" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand['id'] }}">{{ $brand['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Модель <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select name="modelId" class="form-control">
                                    @foreach ($models as $model)
                                        <option value="{{ $model['id'] }}">{{ $model['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Частота процессора, ГГц <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="frequency" type="text" class="form-control"
                                       name="frequency" value="{{ old('frequency') }}" required autocomplete="frequency" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Память <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="memory" type="text" class="form-control"
                                       name="memory" value="{{ old('memory') }}" required autocomplete="memory" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Создать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
