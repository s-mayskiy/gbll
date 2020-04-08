<li class="nav-item">
    <a class="nav-link " href="{{route('Home')}}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.index')? 'active' : '' }}" href="{{route('admin.index')}}">Админка (корень)</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.create')? 'active' : '' }}" href="{{route('admin.create')}}">Добавить новость</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.downloadNewsByCategory')? 'active' : '' }}" href="{{route('admin.downloadNewsByCategory')}}">Скачать новости по категории</a>
</li>
<br>
