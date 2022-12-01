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
    <a class="nav-link {{ request()->routeIs('admin.index')?' active':'' }}" href="{{ route('admin.index') }}">Админка</a>
</li>
