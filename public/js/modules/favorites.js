export function initFavorites() {
    const favButtons = document.querySelectorAll('.product-card__fav');

    favButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            btn.classList.toggle('product-card__fav--active');

            const svg = btn.querySelector('svg');
            if (btn.classList.contains('product-card__fav--active')) {
                btn.setAttribute('aria-label', 'В избранном');
                if (svg) {
                    svg.setAttribute('fill', '#FF0000');
                    svg.setAttribute('stroke', '#FF0000');
                }
            } else {
                btn.setAttribute('aria-label', 'В избранное');
                if (svg) {
                    svg.setAttribute('fill', 'none');
                    svg.setAttribute('stroke', '#8B93A3');
                }
            }
        });
    });
}
