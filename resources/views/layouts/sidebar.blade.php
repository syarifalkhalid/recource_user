<li class="sidebar-title">Menu</li>
<li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
    <a href="/dashboard" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item {{ request()->is('berkas*') ? 'active' : '' }}">
    <a href="{{ route('showBerkas') }}" class='sidebar-link'>
        <i class="bi bi-journal-bookmark-fill"></i>
        <span>Upload Berkas</span>
    </a>
</li>

<li class="sidebar-item {{ request()->is('pengumuman*') ? 'active' : '' }} ">
    <a href="{{ route('showPengumuman') }}" class='sidebar-link'>
        <i class="bi bi-megaphone-fill"></i>
        <span>Pengumuman</span>
    </a>
</li>

<li class="sidebar-title">Action</li>
<li class="sidebar-item">
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        {{-- <button class="btn btn-danger">Logout</button> --}}
        <button type="submit" class="btn btn-danger btn-block btn-lg-sm shadow-lg-sm">
            <span>Log out</span>
        </button>
    </form>
    {{-- <a href="{{ route('logout') }}" class='sidebar-link'>
        <i class="bi bi-box-arrow-left"></i>
        <span>Log out</span>
    </a> --}}
</li>

{{-- <li class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-grid-1x2-fill"></i>
        <span>Layouts</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item ">
            <a href="layout-default.html">Default Layout</a>
        </li>
        <li class="submenu-item ">
            <a href="layout-vertical-1-column.html">1 Column</a>
        </li>
        <li class="submenu-item ">
            <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
        </li>
        <li class="submenu-item ">
            <a href="layout-horizontal.html">Horizontal Menu</a>
        </li>
    </ul>
</li> --}}
