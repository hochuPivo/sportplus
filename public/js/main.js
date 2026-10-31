import { initFavorites } from './modules/favorites.js';
import { initCart } from './modules/cart.js';

document.addEventListener('DOMContentLoaded', () => {
    initFavorites();
    initCart();

    const searchForm = document.querySelector('.search');
    const catalogBtn = document.querySelector('.btn-catalog');
    if (catalogBtn && searchForm) {
        catalogBtn.addEventListener('click', () => {
            const input = searchForm.querySelector('.search__input');
            if (input) {
                input.focus();
            }
        });
    }

    const routeBtn = document.querySelector('a[href="#route"]');
    const mapElement = document.getElementById('map');
    if (routeBtn && mapElement) {
        routeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            mapElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    }
});
