<section class="products container" id="catalog">
  <div class="section-head products__head">
    <h2 class="section-head__title">
      @if(!empty($search))
        Результаты поиска «{{ $search }}» ({{ $products->count() }})
      @else
        Товары для вас
      @endif
    </h2>
    <a href="{{ route('home') }}#catalog" class="section-head__link">Весь каталог</a>
  </div>

  <div class="products__row">
    @forelse ($products as $product)
      <article class="product-card">
        <div class="product-card__top">
          <div class="product-card__header">
            @if ($product->badge)
              <span class="badge-pill">{{ $product->badge }}</span>
            @endif
            <button class="product-card__fav" type="button" aria-label="В избранное">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8B93A3" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
            </button>
          </div>
          <div class="product-card__image-box">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-card__img" loading="lazy">
          </div>
        </div>

        <div class="product-card__info">
          <div class="product-card__meta">
            <span class="product-card__brand">{{ $product->brand }}</span>
            <h3 class="product-card__name">{{ $product->name }}</h3>
          </div>
          <div class="product-card__price">{{ $product->formatted_price }}</div>
        </div>

        <form action="{{ route('cart.add') }}" method="POST">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          @php
            $inCart = isset(session('cart', [])[$product->id]);
          @endphp
          <button class="product-card__btn {{ $inCart ? 'product-card__btn--added' : '' }}" type="submit">
            {{ $inCart ? 'В корзине' : 'В корзину' }}
          </button>
        </form>
      </article>
    @empty
      <div style="width: 100%; padding: 40px; text-align: center; color: var(--color-text-muted);">
        По вашему запросу товары не найдены. <a href="{{ route('home') }}" style="color: var(--color-orange-ui); text-decoration: underline;">Сбросить фильтр</a>
      </div>
    @endforelse
  </div>
</section>
