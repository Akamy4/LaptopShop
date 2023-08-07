<!DOCTYPE html>
<html>
<head>
    <title>Laptop Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #01539c;
            font-family: 'Open Sans', sans-serif;
        }

        .navbar {
            background-color: #2b2b2b !important;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }

        .nav-link {
            font-size: 18px;
        }

        .jumbotron {
            background-position: center;
            background-size: cover;
            background-color: #eda37f;
            height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            color: #01539b;
        }

        .jumbotron h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .jumbotron p {
            font-size: 24px;
            margin-bottom: 30px;
        }

        .jumbotron a {
            font-size: 18px;
            padding: 12px 24px;
            border-radius: 50px;
            background-color: #01539b;
            color: white;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .jumbotron a:hover {
            background-color: #0069d9;
        }

        .card {
            border: none;
            margin: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            height: 200px;
            object-fit: contain;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        #admin-select {
            width: 200px;
            border: none;
            background-color: transparent;
            appearance: none;
            -webkit-appearance: none;
        }

        #admin-select option {
            background-color: #2b2b2b;
            font-size: 18px;
            font-weight: 400;
            padding: 6px 12px;
        }

        #admin-select:focus {
            border-color: #8ad4ee;
            outline: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Laptop Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Ноутбуки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Аксессуары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Связаться с нами</a>
            </li>
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Авторизоваться</a>
                </li>
            @endguest
            @if (Gate::allows('viewAny', App\Module\Users\Models\User::class))
                <li class="nav-item">
                    <select class="nav-link" id="admin-select" onchange="window.location.href=this.value;">
                        <option value="" disabled selected hidden>Админ</option>
                        <option value="{{ route('users.index') }}">Список пользователей</option>
                        <option value="#">Связаться с нами</option>
                    </select>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="jumbotron">
    <h1>Добро пожаловать в магазин ноутбуков</h1>
    <p>Получите новейшие ноутбуки и аксессуары по лучшим ценам.</p>
    <a href="#" class="btn btn-lg">Купить сейчас</a>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center my-5" style="color: white">Избранные ноутбуки</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top"
                     src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/dell-client-products/notebooks/xps-notebooks/xps-13-9315/media-gallery/notebook-xps-9315-nt-blue-gallery-3.psd?fmt=png-alpha&pscan=auto&scl=1&hei=402&wid=575&qlt=100,1&resMode=sharp2&size=575,402&chrss=full"
                     alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">Dell XPS 13</h5>
                    <p class="card-text">Идеальный ноутбук для опытных пользователей и профессионалов.</p>
                    <a href="#" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top"
                     src="https://149426355.v2.pressablecdn.com/wp-content/uploads/2021/10/mbp-2021-bbedit-lede.png"
                     alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">MacBook Pro</h5>
                    <p class="card-text">Культовый ноутбук для творческих профессионалов и энтузиастов.</p>
                    <a href="#" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top"
                     src="https://techplaza.kz/image/catalog/2022/png/Asus%20ZenBook%20Pro%20Duo%20OLED-1.png"
                     alt="Laptop">
                <div class="card-body">
                    <h5 class="card-title">Asus ZenBook</h5>
                    <p class="card-text">Изящный и мощный ноутбук для повседневного использования.</p>
                    <a href="#" class="btn btn-primary">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5" style="color: white">
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
            <h3>Связаться с нами</h3>
            <form>
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea class="form-control" id="message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

<footer class="bg-dark text-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2023 Laptop Shop. Все права защищены.</p>
            </div>
            <div class="col-md-6 text-right">
                <p>Designed by Aznabakiev Abdrakhman</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
