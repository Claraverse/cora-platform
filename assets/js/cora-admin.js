document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('coraToggle');
    const sidebar = document.getElementById('coraSidebar');

    if (!toggle || !sidebar) return;

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
});
