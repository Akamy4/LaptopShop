@php session_start();
@endphp
@if(empty($_SESSION['role']))
    <?php
    $url = \Illuminate\Support\Facades\URL::route('home');
    header("Location: $url");
    exit();
    ?>
@endif

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

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card p-3">
            <div class="col-md-1 ml-auto">
                <form action="{{ route('order.destroy', ['id' => $order['id']]) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('Удалить') }}</button>
                </form>
                <div class="ml-auto"></div>
            </div>
            <hr>
            <h2>Информация о заказчике</h2>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Имя:</strong> {{$order->user->name}} </p>
                    <p><strong>Фамилия:</strong> {{$order->user->surname}} </p>
                    <p><strong>Адрес:</strong> {{$order->user->address}} </p>
                    <p><strong>Электронная почта:</strong> {{$order->user->email}} </p>
                    <p><strong>Номер телефона:</strong> {{$order->user->phone}} </p>
                </div>
            </div>
            <h1>Информация о заказах</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Номер заказа</th>
                    <th scope="col">Ноутбук</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Цена за единицу</th>
                    <th scope="col">Итоговая цена</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $count = $order->orderItem->isNotEmpty() ? count($order->orderItem) : 1;
                @endphp

                <tr>
                    <td class="align-middle" rowspan="{{ $count }}">{{ $order->id }}</td>
                    @if ($order->orderItem->isNotEmpty())
                        <td class="align-middle">{{ $order->orderItem->first()->laptop->title }}</td>
                        <td class="align-middle">{{ $order->orderItem->first()->quantity }}</td>
                        <td class="align-middle">{{ $order->orderItem->first()->unit_price }}</td>
                    @else
                        <td colspan="2"></td>
                    @endif
                    <td class="align-middle" rowspan="{{ $count }}">{{ $order->total_price }}</td>
                    <td class="align-middle" rowspan="{{ $count }}">{{ $order->user->phone }}</td>

                </tr>
                @if ($order->orderItem->count() > 1)
                    @foreach($order->orderItem->skip(1) as $item)
                        <tr>
                            <td class="align-middle">{{ $item->laptop->title }}</td>
                            <td class="align-middle">{{ $item->quantity }}</td>
                            <td class="align-middle">{{ $item->unit_price }}</td>
                        </tr>
                    @endforeach
                @endif
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
