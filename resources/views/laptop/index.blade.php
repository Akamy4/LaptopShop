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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Ноутбуки') }}</div>

                <div class="card-body">
                    <form action="{{ route('laptop.index') }}" method="GET" class="mb-4">
                        @csrf
                        <div class="form-row">
                            <div class="col-sm-4 mb-2">
                                <input type="text" class="form-control" id="title" name="title"
                                       placeholder="{{ __('Название') }}">
                            </div>
                            <div class="col-sm-4 mb-2">
                                <select name="brandId" class="form-control">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand['id'] }}">{{ $brand['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <button type="submit" class="btn btn-primary w-100">{{ __('Поиск') }}</button>
                            </div>
                        </div>
                    </form>
                    @foreach($laptops as $item)
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/images/products/' . $item->image) }}" class="card-img">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->brand->title . ' ' . $item->title}}</h5>
                                        <p class="card-text">Процессор: {{ $item->processor->brand->title . ' ' . $item->processor->type->title . ' ' . $item->processor->model->title }}</p>
                                        <p class="card-text">Видеокарта: {{ $item->videoCard->brand->title . ' ' . $item->videoCard->model->title }}</p>
                                        <p class="card-text">Память ОЗУ, Гб: {{ $item->ram_memory }}</p>
                                        <p class="card-text">Память, Гб: {{ $item->memory }} SSD</p>
                                        <p class="card-text">Диагональ: {{ $item->diagonal }} дюймов</p>
                                        <p class="card-text">Разрешение экрана: {{ $item->screen_resolution }}</p>
                                        <p class="card-text">Цена: {{ number_format($item->price, 0, '.', ' ') }} ТГ</p>
                                        <p class="card-text">Количество: {{ $item->quantity }}</p>
                                        <div style="width: 100%;">
                                            <a href="{{route('cart.addToCart', ['id' => $item['id']]) }}" class="btn btn-primary" style="display:inline-block;">Добавить в корзину</a>
                                            <a href="{{route('laptop.more', ['id' => $item['id']]) }}" class="btn btn-primary" style="display:inline-block;">Подробнее</a>
                                            @if (!empty($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == 1)
                                            <form action="{{ route('laptop.destroy', ['id' => $item['id']]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('Удалить') }}</button>
                                            </form>
                                            <form action="{{ route('laptop.show', ['id' => $item['id']]) }}" method="GET" style="display:inline-block;">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-warning">{{ __('Редактировать') }}</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center mt-4">
                        {{$laptops->links()}}
                    </div>
                    @if (!empty($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == 1)
                    <div class="text-center mt-4">
                        <a href="{{ route('laptop.store-page') }}" class="btn btn-primary">{{ __('Добавить ноутбук') }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
