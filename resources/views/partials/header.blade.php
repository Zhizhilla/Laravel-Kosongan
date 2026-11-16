<header>
    <a href="{{ route('welcome') }}" class="brand">ZHIZHILLA</a>
    <nav>
        <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'active' : '' }}">Welcome</a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">Deskripsi Diri</a>
        <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a>
    </nav>
</header>