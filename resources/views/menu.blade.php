<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('Home')? 'active' : '' }}" href="{{ route('Home') }}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('Categories.index')? 'active' : '' }}" href="{{route('Categories.index')}}">Категории</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('News.index')? 'active' : '' }}" href="{{route('News.index')}}">Все новости</a>
</li>
@if ($adminMenuAvailable)
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Админка
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{route('admin.index')}}">Админка (корень)</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('admin.news.index') }}">Админка новостей</a>
        <a class="dropdown-item" href="{{ route('admin.categories.index') }}">Админка категорий</a>
        <a class="dropdown-item" href="{{ route('admin.users.index') }}">Пользователи</a>
        <a class="dropdown-item" href="{{ route('admin.parse') }}">Загрузить новости</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('admin.downloadNewsByCategory') }}">Скачать новости по категории</a>
    </div>
</li>
@endif
