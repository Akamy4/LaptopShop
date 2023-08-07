<!DOCTYPE html>
<html>
<head>
    <title>Главная</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
@include('includes.header')
<div class="container-fluid">
    <div class="row py-1">
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top"
                src="{{ asset('storage/images/products/98bdf815-05a6-4621-bb6c-b1304165518e.jpg') }}"
                     alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">Dell XPS 13</h5>
                    <p class="card-text">Идеальный ноутбук для опытных пользователей и профессионалов.</p>
                    <a href="{{route('laptop.more', ['id' => 1]) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top"
                     src="{{ asset('storage/images/products/image.jpg') }}"
                     alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">MacBook Pro</h5>
                    <p class="card-text">Культовый ноутбук для творческих профессионалов и энтузиастов.</p>
                    <a href="{{route('laptop.more', ['id' => 3]) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top"
                     src="{{ asset('storage/images/products/image (1).jpg') }}"
                     alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">Asus ZenBook</h5>
                    <p class="card-text">Изящный и мощный ноутбук для повседневного использования.</p>
                    <a href="{{route('laptop.more', ['id' => 2]) }}" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-1" style="color: white">
    <div class="row">
        <div class="col-md-6">
            <h3>О нас</h3>
            <p>Добро пожаловать в наш новый магазин ноутбуков! Мы — команда энтузиастов технологий, которые увлечены
                тем, чтобы предоставить нашим клиентам наилучшие вычислительные возможности. Наш магазин предназначен
                для предоставления высококачественных ноутбуков по конкурентоспособным ценам, и мы стремимся обеспечить
                отличное обслуживание клиентов.</p>
            <p>Мы понимаем, что покупка ноутбука может быть ошеломляющей, когда есть из чего выбирать. Вот почему у нас
                есть команда знающих экспертов, которые всегда готовы помочь вам принять взвешенное решение. Являетесь
                ли вы студентом, бизнесменом или геймером, у нас есть подходящий ноутбук для вас.
            </p>
        </div>
        <div class="col-md-6">
            <h3>Доставка и оплата</h3>
            <p>Мы осуществляем бесплатную доставку по городу Алматы. Если вы оформили заказ до 12:00, то доставка будет
                выполнена в тот же день, а если после 12:00 - на следующий день. Для доставки в другие регионы
                Казахстана мы взимаем плату в размере 2000 тенге.</p>
            <p>Вы можете оплатить свой заказ наличными курьеру при получении, с помощью Kaspi QR или перевода на наш
                банковский счет. При оплате наличными не забудьте подготовить точную сумму, так как наши курьеры не
                имеют возможности менять большие купюры. Если вы выберете оплату через Kaspi QR, то вам необходимо будет
                отсканировать QR-код, который предоставит наш курьер при доставке. Для перевода на наш банковский счет
                вы можете воспользоваться интернет-банком или любым другим удобным для вас способом.
            </p>
        </div>
    </div>
</div>

</body>
@include('includes.footer')
</html>
