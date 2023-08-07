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
                <div class="card-header">Добавить ноутбук</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('laptop.store') }}" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Название <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control"
                                       name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                            </div>
                        </div>
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
                            <label for="title" class="col-md-4 col-form-label text-md-right">Процессор <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select name="processorId" class="form-control">
                                    @foreach ($processors as $processor)
                                        <option value="{{ $processor['id'] }}">{{ $processor['title'] . ' ' . $processor['brand']['title'] . ' ' . $processor['type']['title']  . ' ' . $processor['model']['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Видеокарта <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select name="videoCardId" class="form-control">
                                    @foreach ($videoCards as $videoCard)
                                        <option value="{{ $videoCard['id'] }}">{{ $videoCard['title'] . ' ' . $videoCard['brand']['title'] . ' ' . $videoCard['model']['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Объем ОЗУ <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="ramMemory" type="text" class="form-control"
                                       name="ramMemory" value="{{ old('ramMemory') }}" required autocomplete="ramMemory" autofocus>
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
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Диагональ <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="diagonal" type="text" class="form-control"
                                       name="diagonal" value="{{ old('diagonal') }}" required autocomplete="diagonal" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Разрешение экрана <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="screenResolution" type="text" class="form-control"
                                       name="screenResolution" value="{{ old('screenResolution') }}" required autocomplete="screenResolution" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Цена <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control"
                                       name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Количество <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control"
                                       name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Фото <span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="image" name="image">
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
