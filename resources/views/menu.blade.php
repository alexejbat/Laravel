<li class="nav-item">
    <a class="nav-link{{ request()->routeIs('home')?' active':'' }}" href="{{ route('home') }}">Главная</a>
</li>

<li class="nav-item">
    <a class="nav-link{{ request()->routeIs('news.index')?' active':'' }}" href="{{ route('news.index') }}">Новости</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('news.category.index')?' active':'' }}" href="{{ route('news.category.index') }}">Категории</a>
</li>

<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('admin.news.index')?' active':'' }}" href="{{ route('admin.news.index') }}">Админка</a>
</li>
