const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.getElementById('toggleButton');
        const materiButton = document.getElementById('materiButton');
        const materiSubmenu = document.getElementById('materiSubmenu');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('sidebar-open');
            content.classList.toggle('content-collapsed');
        });

        materiButton.addEventListener('click', () => {
            materiSubmenu.classList.toggle('submenu-open');
        });