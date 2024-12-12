document.getElementById('menuToggle').addEventListener('click', function () {
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileMenu) {
        mobileMenu.classList.toggle('hidden');
        console.log('Menu toggled, current classes:', mobileMenu.className);
    } else {
        console.error('mobileMenu element not found.');
    }
});