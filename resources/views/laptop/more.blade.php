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
            <?php
            unset($_SESSION['success']); ?>
    @endif
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <h1 class="text-center">Подробнее</h1>
            <hr/>

            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('storage/images/products/' . $laptop->image) }}" class="card-img">
                </div>
                <div class="col-md-3">
                    <h3>Ноутбкук {{$laptop->title}}</h3>
                    <p>Брэнд: {{$laptop->brand->title}}</p>
                    <p>Объем ОЗУ, Гб: {{$laptop->ram_memory}}</p>
                    <p>Объем памяти, ГБ: {{$laptop->memory}} SSD</p>
                    <p>Разрешение экрана: {{$laptop->screen_resolution}}</p>
                    <p>Цена: {{$laptop->price}} ТГ</p>
                    <p>Количество: {{$laptop->quantity}}</p>
                </div>
                <div class="col-md-3">
                    <h3>Процессор {{$laptop->processor->brand->title . ' ' . $laptop->processor->type->title}}</h3>
                    <p>Медель процессора: {{$laptop->processor->model->title}}</p>
                    <p>Частота процессора, ГГц: {{$laptop->processor->frequency}}</p>
                    <p>Количество ядер: {{$laptop->processor->core}} SSD</p>
                    <p>Количество потоков: {{$laptop->processor->thread}}</p>
                </div>
                <div class="col-md-4">
                    <h3>Видеокарта {{$laptop->videoCard->brand->title . ' ' . $laptop->videoCard->model->title}}</h3>
                    <p>Медель видеокарты: {{$laptop->videoCard->model->title}}</p>
                    <p>Частота видеокарты, ГГц: {{$laptop->videoCard->frequency}}</p>
                    <p>Память видеокарты, ГБ: {{$laptop->videoCard->memory}} SSD</p>
                </div>
            </div>
            <div class="text-center d-flex justify-content-center">
                <a href="{{route('cart.addToCart', ['id' => $laptop['id']]) }}" class="btn btn-primary">Добавить в корзину</a>
            </div>
        </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
