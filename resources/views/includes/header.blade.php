<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">Laptop Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('laptop.index') }}">Ноутбуки</a>
            </li>
            <li class="nav-item">
                @if (!empty($_SESSION) && isset($_SESSION['role']))
                    <a class="nav-link" href="{{route('user.show', ['id' => $_SESSION['id']])}}">Мой профиль</a>
                @endif
            </li>
            <li class="nav-item">
                @if (!empty($_SESSION) && isset($_SESSION['role']))
                <?php
                $count = count($_SESSION['cart'] ?? []);
                ?>
                <a class="nav-link" href="{{route('cart.index')}}">Корзина ({{ $count }})</a>
                @endif
            </li>
            @if (isset($_SESSION['role']))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout.session') }}">Выйти</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Авторизоваться</a>
                </li>
            @endif
            @if (!empty($_SESSION) && isset($_SESSION['role']) && $_SESSION['role'] == 1)
                <li class="nav-item">
                    <select class="nav-link" id="admin-select" onchange="window.location.href=this.value;">
                        <option value="" disabled selected hidden>Админ</option>
                        <option value="{{ route('user.index') }}">Список пользователей</option>
                        <option value="{{ route('model.store') }}">Модели</option>
                        <option value="{{ route('brand.index') }}">Брэнды</option>
                        <option value="{{ route('type.index') }}">Типы комплектующих</option>
                        <option value="{{ route('processor.index') }}">Процессоры</option>
                        <option value="{{ route('video-card.index') }}">Видеокарты</option>
                        <option value="{{ route('laptop.index') }}">Ноутбуки</option>
                        <option value="{{ route('order.index') }}">Заказы</option>
                    </select>
                </li>
            @endif
        </ul>
    </div>
</nav>
