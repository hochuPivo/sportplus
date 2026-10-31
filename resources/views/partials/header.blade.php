<header class="header">
  <div class="header__wrap container">
    <a href="{{ route('home') }}" class="logo">
      <span class="logo__accent">СПОРТ</span><span class="logo__main">ПЛЮС</span>
    </a>

    <div class="header__controls">
      <div class="header__search-group">
        <button class="btn-catalog" type="button" aria-label="Открыть каталог товаров">
          <svg class="btn-catalog__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.8" stroke-linecap="round">
            <line x1="4" y1="7" x2="20" y2="7"></line>
            <line x1="4" y1="12" x2="20" y2="12"></line>
            <line x1="4" y1="17" x2="20" y2="17"></line>
          </svg>
          <span class="btn-catalog__text">Каталог</span>
        </button>

        <form class="search" action="{{ route('home') }}" method="GET" role="search">
          <svg class="search__icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#7F8286" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7"></circle>
            <line x1="20" y1="20" x2="16.2" y2="16.2"></line>
          </svg>
          <input type="search" name="q" value="{{ request('q') }}" class="search__input" placeholder="Найти товар, бренд или категорию" aria-label="Поиск по каталогу">
        </form>
      </div>

      <div class="header__actions">
        <a href="#favorites" class="action-item" aria-label="Перейти в избранное">
          <svg class="action-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#474747" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
          </svg>
          <span class="action-item__label">Избранное</span>
        </a>

        <a href="#profile" class="action-item" aria-label="Личный кабинет">
          <svg class="action-item__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#474747" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
          <span class="action-item__label">Профиль</span>
        </a>

        @php
          $cartCount = array_sum(array_column(session('cart', []), 'quantity'));
        @endphp
        <button class="cart-btn" type="button" aria-label="Корзина покупок" onclick="alert('В корзине: {{ $cartCount }} шт.')">
          <svg class="cart-btn__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
          </svg>
          <span class="cart-btn__badge">{{ $cartCount }}</span>
        </button>
      </div>
    </div>
  </div>
</header>
