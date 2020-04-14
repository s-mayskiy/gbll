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
    <a class="nav-link {{ request()->routeIs('admin.downloadNewsByCategory')? 'active' : '' }}" href="{{route('admin.downloadNewsByCategory')}}">Скачать новости по категории</a>
</li>
<br>
