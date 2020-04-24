<li class="nav-item">
    <a class="nav-link " href="{{route('Home')}}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.index')? 'active' : '' }}" href="{{route('admin.index')}}">Админка (корень)</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.news.index')? 'active' : '' }}" href="{{route('admin.news.index')}}">Админка новостей</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.categories.index')? 'active' : '' }}" href="{{route('admin.categories.index')}}">Админка категорий</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.users.index')? 'active' : '' }}" href="{{route('admin.users.index')}}">Пользователи</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.resources.index')? 'active' : '' }}" href="{{route('admin.resources.index')}}">Ресурсы</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Действия
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="{{ route('admin.parse') }}">Поставить в очередь задания на выгрузку новостей</a>
        <a class="dropdown-item" href="{{ route('admin.downloadNewsByCategory') }}">Скачать новости по категории</a>
    </div>
</li>
