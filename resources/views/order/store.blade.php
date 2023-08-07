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
    <title>Заказы</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
@include('includes.header')
@if(isset($_SESSION['success']))
    <div class="alert alert-success">
        {{ $_SESSION['success'] }}
    </div>
        <?php
        unset($_SESSION['success']); ?>
    @endif

    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Оформить заказ</div>
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="title" type="hidden" class="form-control"
                                           name="userId" value="{{$_SESSION['id']}}" required autocomplete="title"
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                @php $totalPrice = 0 @endphp
                                @if(isset($_SESSION['cart']))
                                    @foreach (array_values($_SESSION['cart']) as $index => $laptop)
                                        <div class="row">
                                            <input type="hidden" class="form-control" name="laptop[{{ $index }}][id]"
                                                   value="{{ $laptop['id'] }}" readonly>
                                            <div class="col-md-4">
                                                <label>Ноутбук:</label>
                                                <input type="text" class="form-control" value="{{ $laptop['title'] }}"
                                                       readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Цена:</label>
                                                <input type="text" class="form-control"
                                                       name="laptop[{{ $index }}][unitPrice]"
                                                       value="{{$laptop['price'] * $laptop['quantity']}}" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Количество:</label>
                                                <input type="text" class="form-control"
                                                       name="laptop[{{ $index }}][quantity]"
                                                       value="{{ $laptop['quantity'] }}" readonly>
                                            </div>
                                        </div>
                                        @php $totalPrice += $laptop['quantity'] * $laptop['price'] @endphp
                                    @endforeach
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="totalPrice">Итоговая цена:</label>
                                <input id="title" type="text" class="form-control"
                                       name="totalPrice" value="{{$totalPrice}}" required autocomplete="title"
                                       autofocus readonly>
                            </div>
                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Оформить заказ
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
