<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Home') }}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Categories.index')}}">Категории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('News.index')}}">Все новости</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Админка
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.test1') }}">Тест1</a>
                    <a class="dropdown-item" href="{{ route('admin.test2') }}">Тест2</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
