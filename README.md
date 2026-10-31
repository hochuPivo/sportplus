# Спортмикс (СПОРТ ПЛЮС)

Сайт интернет-магазина спортивных товаров на Laravel.

## Реализация

### 1. Роутинг, контроллеры и шаблоны (Blade)
* **Роуты** (`routes/web.php`):
  * `/` — главная страница с каталогом и поиском
  * `/callback` — отправка заявки на звонок (POST)
  * `/cart/add` — добавление товара в корзину (POST)
  * `/cart/clear` — очистка корзины (POST)
* **Контроллеры**:
  * `ProductController` — вывод и поиск товаров
  * `CallbackController` — прием заявок с формы
  * `CartController` — добавление и очистка корзины
* **Шаблоны** (`resources/views/`):
  * `layouts/app.blade.php` — основной шаблон
  * `partials/` — модульные части страницы (`header`, `hero`, `products`, `about`, `delivery`, `contacts`, `callback-modal`, `footer`)

### 2. Модели и миграции
* **Product** (`products`) — товары каталога (название, бренд, цена, картинка, наличие).
* **CallbackRequest** (`callback_requests`) — заявки на обратный звонок (имя, телефон, комментарий).
* База данных SQLite, заполнение 5 товарами через сидер `ProductSeeder`.

### 3. Прием и валидация данных (POST)
* Форма в модальном окне отправляет POST-запрос на `/callback` с `@csrf`.
* Валидация в `StoreCallbackRequest` (проверка полей `name`, `phone`, `comment`).
* Ошибки выводятся под полями через `@error`, значения сохраняются через `old()`.

### 4. Сессии
* Корзина хранится в сессии (`session('cart')`).
* Счетчик товаров в шапке обновляется из сессии.
* Flash-сообщения при добавлении в корзину и отправке заявки.

### 5. События и слушатели
* Событие: `CallbackRequested`
* Слушатель: `SendCallbackNotification`
* Зарегистрированы в `AppServiceProvider`. При сохранении заявки срабатывает событие и делает запись в `storage/logs/laravel.log`.

---

## Запуск проекта

```bash
composer install
php artisan migrate --seed
php artisan serve
```

Запуск тестов:
```bash
php artisan test
```
