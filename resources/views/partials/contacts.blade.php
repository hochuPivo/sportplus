<section class="contacts" id="contacts">
  <div class="section-head contacts__head">
    <h2 class="section-head__title">Контакты</h2>
  </div>

  <div class="contacts__grid">
    <div class="contacts__card">
      <div class="contacts__list">
        <div class="contacts__item">
          <span class="contacts__label">Адрес</span>
          <span class="contacts__value">г. Москва, ул. xxx, 67</span>
        </div>
        <div class="contacts__item">
          <span class="contacts__label">Телефон</span>
          <a href="tel:+79999999999" class="contacts__value">+7 (999) 999-99-99</a>
        </div>
        <div class="contacts__item">
          <span class="contacts__label">Электронная почта</span>
          <a href="mailto:example@email.ru" class="contacts__value">example@email.ru</a>
        </div>
      </div>

      <div class="contacts__actions">
        <button type="button" class="contacts__btn contacts__btn--primary" onclick="openCallbackModal()">Заказать звонок</button>
        <a href="#map" class="contacts__btn contacts__btn--dark">Проложить маршрут</a>
      </div>
    </div>

    <div class="contacts__map" id="map" aria-label="Интерактивная карта проезда">
      <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa2ccb08ef64175d921144f5a3ac59e1ba45f95bb8547e4204f474779abc103ef&amp;width=1035&amp;height=489&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
  </div>
</section>
