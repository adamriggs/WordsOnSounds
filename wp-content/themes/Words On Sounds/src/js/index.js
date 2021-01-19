document.addEventListener('DOMContentLoaded', () => {
    // document.querySelectorAll('header .menu-item-has-children').forEach(node => {
    //     node.addEventListener('mouseenter', e => {
    //         e.preventDefault();
    //         e.stopPropagation();
    //         e.target.classList.add('menu-open');
    //     });
    //     node.addEventListener('mouseleave', e => {
    //         e.preventDefault();
    //         e.stopPropagation();
    //         e.target.classList.remove('menu-open');
    //     });
    // });

    const hamburger = document.getElementById('hamburger-menu');
    const mobileMenu = document.getElementById('menu__mobile');
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('is-active');
        mobileMenu.classList.toggle('show');
    });

    const searchButton = document.getElementsByClassName('search__button');
    const searchInput = document.getElementsByClassName('search__input');
    Array.from(searchButton).forEach((element)=> {
        element.addEventListener('click', () => {
            let searchArea = element.classList.contains('search__header') ? 'search__header' : 'search__footer';
            Array.from(searchInput).forEach((input)=> {
                if (input.value.trim() === '') {
                    input.classList.toggle('show');
                    if (input.classList.contains('show') && input.classList.contains(searchArea)) {
                        input.focus();
                    }
                } else {
                    let href = window.location.origin;
                    let search = '/?s=' + input.value;
                    window.location = href + search;
                }
            });
        });
    });

    Array.from(searchInput).forEach((element) => {
        element.addEventListener('keyup', (event) => {
            if (event.keyCode === 13 && element.value.trim() !== '') {
                let href = window.location.origin;
                let search = '/?s=' + element.value;
                window.location = href + search;
            } else if (event.keyCode === 13 && element.value.trim() === '') {
                element.classList.toggle('show');
            }
        });
    });
});
