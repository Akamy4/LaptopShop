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
        <div class="card p-3">
            <h1>Информация о заказах</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Номер заказа</th>
                    <th scope="col">Ноутбук</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Итоговая цена</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">Заказчик</th>
                    <th scope="col">Номер заказчика</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @php
                        $count = $order->orderItem->isNotEmpty() ? count($order->orderItem) : 1;
                    @endphp

                    <tr>
                        <td class="align-middle" rowspan="{{ $count }}">{{ $order->id }}</td>
                        @if ($order->orderItem->isNotEmpty())
                            <td class="align-middle">{{ $order->orderItem->first()->laptop->title }}</td>
                            <td class="align-middle">{{ $order->orderItem->first()->quantity }}</td>
                        @else
                            <td colspan="2"></td>
                        @endif
                        <td class="align-middle" rowspan="{{ $count }}">{{ $order->total_price }}</td>
                        <td class="align-middle" rowspan="{{ $count }}">{{ $order->user->address }}</td>
                        <td class="align-middle" rowspan="{{ $count }}">{{ $order->user->name }} {{ $order->user->email }}</td>
                        <td class="align-middle" rowspan="{{ $count }}">{{ $order->user->phone }}</td>
                        <td class="align-middle" rowspan="{{ $count }}">
                            <form action="{{ route('order.show', ['id' => $order['id']]) }}" method="GET" style="display:inline-block;">
                                @csrf
                                @method('GET')
                                <button type="submit" class="btn btn-warning">{{ __('Просмотр') }}</button>
                            </form>
                        </td>

                    </tr>
                    @if ($order->orderItem->count() > 1)
                        @foreach($order->orderItem->skip(1) as $item)
                            <tr>
                                <td class="align-middle">{{ $item->laptop->title }}</td>
                                <td class="align-middle">{{ $item->quantity }}</td>
                            </tr>
                        @endforeach
                    @endif
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
