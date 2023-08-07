<?php

session_start();
if (empty($_SESSION['role'])) {
    $url = \Illuminate\Support\Facades\URL::route('home');
    header("Location: $url");
    exit();
}
$i = 1;
$total = 0;
?>
    <!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h1 class="text-center mb-5">Корзина</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Название</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена за единицу</th>
                        <th scope="col">Итого</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($_SESSION['cart']))

                        @foreach($_SESSION['cart'] as $item)
                            <tr>
                                <th class="align-middle" scope="row">{{$i}}</th>
                                <td><img src="{{ asset('storage/images/products/' . $item['photo'])}}" class="card-img"
                                         width="100"
                                         height="100"></td>
                                <td class="align-middle">{{$item['title']}}</td>
                                <td class="align-middle">{{$item['quantity']}}</td>
                                <td class="align-middle">{{ number_format($item['price'], 0, '.', ' ') }}</td>
                                <td class="align-middle">{{ number_format($item['price'] * $item['quantity'], 0, '.', ' ') }}</td>
                                <td class="align-middle">
                                    <form action="{{route('cart.remove', ['id' => $item['id']])}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                            @php $i++;

                    $total += $item['price'] * $item['quantity'];
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Итого {{number_format($total, 0, '.', ' ')}}</td>
                        <td></td>
                    </tr>
                    </tfoot>

                    @endif
                </table>

                <div class="row">
                    <div class="col-md-4 mt-3 mb-3 rounded">
                        <a href="{{route('laptop.index')}}" class="btn btn-primary btn-block">Продолжить покупки</a>
                    </div>
                    <div class="col-md-4 mt-3 mb-3 rounded">
                        <a href="{{route('order.store-page')}}" type="button" class="btn btn-success btn-block">Оформить
                            заказ</a>
                    </div>
                    <form class="col-md-4 mt-3 mb-3 rounded" method="post" action="{{route('cart.destroy')}}">
                        <div>
                            <button type="submit" name="clear_cart" class="btn btn-danger btn-block">Очистить корзину
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
