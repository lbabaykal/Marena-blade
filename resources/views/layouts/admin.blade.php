<!DOCTYPE html >
<html lang="ru-Ru">
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
</head>
<body>
<header class="header">
    <nav class="menu">
        <a href="/">
            <div class="header-logo">
                <span class="header-logo-left">MOON</span>
                <span class="header-logo-right">HARMONY</span>
            </div>
        </a>
        <ul class="header-nav">
            <li><a href="/">Главная</a></li>
            <li><a href="{{ route('article.filter_article', ['category[]' => 1]) }}">Аниме</a></li>
            <li><a href="{{ route('article.filter_article', ['category[]' => 2]) }}">Дорамы</a></li>
            <li><a href="{{ route('article.filter_article', ['category[]' => 3]) }}">Манга</a></li>
            <li><a href="{{ route('article.filter_article', ['category[]' => 4]) }}">AMV</a></li>
        </ul>
        <img id="search-button" class="header-search" src="{{ asset('images_icon/loupe.svg') }}" alt="Search" onclick="">
        @include('layouts.login')
    </nav>
    <div id="search" class="search">
        <form action="{{ route('article.filter_article') }}" method="GET">
            <input type="search" name="title" />
            <button type="submit">Поиск</button>
        </form>
    </div>
</header>

<section class="content_admin">
    <div class="sidebar">
        <div class="sidebar_name">
            <a href="{{ route('admin.index') }}">Admin Panel</a>
        </div>
        <div class="list_name">Настройки системы</div>
        <div class="list">
            <a href="/"><div class="list_item">Общие</div></a>
            <a href="/"><div class="list_item">Безопасность</div></a>
            <a href="/"><div class="list_item">Посетители</div></a>
            <a href="/"><div class="list_item">Статьи</div></a>
            <a href="/"><div class="list_item">Комментарии</div></a>
            <a href="/"><div class="list_item">Файлы</div></a>
            <a href="/"><div class="list_item">Изображения</div></a>
        </div>
        <div class="list_name">Настройки скриптов</div>
        <div class="list">
            @can('viewAny', \App\Models\User::class)
            <a href="{{ route('admin.users.index') }}" class="@if(request()->routeIs('admin.users.*')) list_item_active @endif">
                <div class="list_item">Пользователи</div>
            </a>
            @endcan
            @can('viewAny', \App\Models\Role::class)
                <a href="{{ route('admin.roles.index') }}" class="@if(request()->routeIs('admin.roles.*')) list_item_active @endif">
                    <div class="list_item">Роли пользователей</div>
                </a>
            @endcan
            @can('viewAny', \App\Models\Article::class)
                <a href="{{ route('admin.articles.index') }}" class="@if(request()->routeIs('admin.articles.*')) list_item_active @endif">
                    <div class="list_item">Статьи</div>
                </a>
            @endcan
            <a href="{{ route('admin.categories.index') }}" class="@if(request()->routeIs('admin.categories.*')) list_item_active @endif">
                <div class="list_item">Категории</div>
            </a>
            <a href="{{ route('admin.countries.index') }}" class="@if(request()->routeIs('admin.countries.*')) list_item_active @endif">
                <div class="list_item">Страны</div>
            </a>
            <a href="{{ route('admin.types.index') }}" class="@if(request()->routeIs('admin.types.*')) list_item_active @endif">
                <div class="list_item">Типы</div>
            </a>
            <a href="{{ route('admin.genres.index') }}" class="@if(request()->routeIs('admin.genres.*')) list_item_active @endif">
                <div class="list_item">Жанры</div>
            </a>
            <a href="{{ route('admin.studios.index') }}" class="@if(request()->routeIs('admin.studios.*')) list_item_active @endif">
                <div class="list_item">Студии</div>
            </a>
            <a href="/">
                <div class="list_item">Персоны</div>
            </a>
            <a href="/">
                <div class="list_item">Категории Персон</div>
            </a>
        </div>
        <div class="list_name">Пользователи</div>
        <div class="list">
            <a href="/Admin_Panel/Users"><div class="list_item">Список пользователей</div></a>
            <a href="/"><div class="list_item">Группы пользователей</div></a>
        </div>
        <div class="list_name">Другие разделы</div>
        <div class="list">
            <a href="/Admin_Panel/Static_Pages"><div class="list_item">Статические страницы</div></a>
        </div>
    </div>
    <div id="notification"></div>
    <div class="content_main">
        @yield('content')
    </div>
</section>


<script type="text/javascript" src="{{ asset('js/js_my.js') }}"></script>

</body>
</html>
