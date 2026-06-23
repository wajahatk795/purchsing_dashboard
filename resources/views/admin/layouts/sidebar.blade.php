<aside id="sidebar" class="sidebar">
    <div class="sidebar-brand">
        <i class="bx bxs-bolt brand-icon"></i>
        <span class="brand-name">Rocker</span>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-header">Core</li>

        <li
            class="menu-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="bx bxs-dashboard"></i>
                <span class="menu-text">Dashboard</span>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
            <a href="{{ route('admin.users') }}" class="menu-link">
                <i class="bx bxs-user-detail"></i>
                <span class="menu-text">Users List</span>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/company') || request()->is('admin/company/*') ? 'active' : '' }}">
            <a href="{{ route('admin.company') }}" class="menu-link">
                <i class="bx bxs-building-house"></i>
                <span class="menu-text">Company</span>
            </a>
        </li>
        <li class="menu-item {{ request()->is('admin/unit') || request()->is('admin/unit/*') ? 'active' : '' }}">
            <a href="{{ route('admin.unit') }}" class="menu-link">
                <i class="bx bx-layer"></i>
                <span class="menu-text">Unit</span>
            </a>
        </li>
        <li
            class="menu-item {{ request()->is('admin/purchasing') || request()->is('admin/purchasing/*') ? 'active' : '' }}">
            <a href="{{ route('admin.purchasing') }}" class="menu-link">
                <i class="bx bxs-cart-download"></i>
                <span class="menu-text">Purchasing</span>
            </a>
        </li>

        {{-- <li class="menu-header">UI Elements</li>
        
        <li class="menu-item">
            <a href="#" class="menu-link" onclick="alert('Feature coming soon!')">
                <i class="bx bxs-widget"></i>
                <span class="menu-text">Widgets</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link" onclick="alert('Feature coming soon!')">
                <i class="bx bxs-shopping-bag"></i>
                <span class="menu-text">eCommerce</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link" onclick="alert('Feature coming soon!')">
                <i class="bx bxs-component"></i>
                <span class="menu-text">Components</span>
            </a>
        </li> --}}

        <li class="menu-header">Systems</li>

        <li class="menu-item">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="bx bx-home-circle"></i>
                <span class="menu-text">Landing Page</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link" onclick="document.getElementById('logout-form').submit();">
                <i class="bx bx-log-out" style="color: var(--danger-color);"></i>
                <span class="menu-text" style="color: var(--danger-color);">Sign Out</span>
            </a>
        </li>
    </ul>
</aside>
