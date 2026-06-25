<header class="header">
    <div class="header-left">
        <button id="sidebar-toggle-btn" class="sidebar-toggle-btn" title="Toggle Sidebar">
            <i class="bx bx-menu"></i>
        </button>
        {{-- <div class="search-box">
            <i class="bx bx-search"></i>
            <input type="text" placeholder="Search...">
        </div> --}}
    </div>
    
    <div class="header-right">
        <!-- Country Flag Mock -->
        {{-- <button class="header-icon-btn" title="Language">
            <i class="bx bx-globe"></i>
        </button> --}}

        <!-- Dark/Light Theme Button Toggle -->
        <button id="theme-toggle-btn" class="header-icon-btn" title="Toggle Theme">
            <i id="theme-icon" class="bx bx-moon"></i>
        </button>

        <!-- Grid Menu Icon -->
        {{-- <button class="header-icon-btn" title="Apps">
            <i class="bx bx-grid-alt"></i>
        </button> --}}

        <!-- Notifications -->
        {{-- <button class="header-icon-btn" title="Notifications">
            <i class="bx bx-bell"></i>
            <span class="badge-count">7</span>
        </button> --}}

        <!-- Messages -->
        {{-- <button class="header-icon-btn" title="Messages">
            <i class="bx bx-message-square-detail"></i>
            <span class="badge-count" style="background-color: var(--accent-color);">8</span>
        </button> --}}

        <!-- User Profile -->
        <div class="user-profile">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150" alt="Avatar" class="user-avatar">
            <div class="user-details">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-role">{{ ucfirst(Auth::user()->role) }}</span>
            </div>
            
            <!-- Standard logout action -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin-left: 10px;">
                @csrf
                <button type="submit" class="header-icon-btn" style="color: var(--danger-color);" title="Log Out">
                    <i class="bx bx-log-out"></i>
                </button>
            </form>
        </div>
    </div>
</header>
