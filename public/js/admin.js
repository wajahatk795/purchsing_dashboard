document.addEventListener('DOMContentLoaded', () => {
    // Theme Management
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const themeIcon = document.getElementById('theme-icon');
    
    // Function to apply theme
    const applyTheme = (theme) => {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        
        // Update icon class based on theme
        if (themeIcon) {
            if (theme === 'dark') {
                themeIcon.className = 'bx bx-sun'; // Show sun icon when in dark mode
            } else {
                themeIcon.className = 'bx bx-moon'; // Show moon icon when in light mode
            }
        }
    };

    // Toggle theme on button click
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            applyTheme(newTheme);
        });
    }

    // Sidebar Toggling
    const sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
    const sidebar = document.getElementById('sidebar');

    // Load initial sidebar state from localStorage
    const sidebarState = localStorage.getItem('sidebar-collapsed');
    if (sidebarState === 'true' && sidebar) {
        sidebar.classList.add('collapsed');
    }

    // Toggle sidebar on click
    if (sidebarToggleBtn && sidebar) {
        sidebarToggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            const isCollapsed = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebar-collapsed', isCollapsed);
        });
    }
});
