document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('header .menu-item-has-children').forEach(node => {
        node.addEventListener('mouseenter', e => {
            e.preventDefault();
            e.stopPropagation();
            e.target.classList.add('menu-open');
        });
        node.addEventListener('mouseleave', e => {
            e.preventDefault();
            e.stopPropagation();
            e.target.classList.remove('menu-open');
        });
    });

    const hamburger = document.getElementById('hamburger-menu');
    const mobileMenu = document.getElementById('menu-mobile');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active');
        mobileMenu.classList.toggle('show');
    });
});
