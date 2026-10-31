<div class="modal-overlay" id="callbackModal" onclick="if(event.target === this) closeCallbackModal()">
  <div class="modal-window">
    <button type="button" class="modal-close-btn" onclick="closeCallbackModal()" aria-label="Закрыть">&times;</button>
    <h3 class="modal-title">Заказать звонок</h3>
    <p class="modal-subtitle">Оставьте контактные данные, и специалист магазина свяжется с вами для консультации.</p>

    <form action="{{ route('callback.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="callbackName" class="form-label">Ваше имя *</label>
        <input 
          type="text" 
          id="callbackName" 
          name="name" 
          class="form-input" 
          placeholder="Например, Александр" 
          value="{{ old('name') }}" 
          required
        >
        @error('name')
          <span class="form-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="callbackPhone" class="form-label">Номер телефона *</label>
        <input 
          type="tel" 
          id="callbackPhone" 
          name="phone" 
          class="form-input" 
          placeholder="+7 (999) 000-00-00" 
          value="{{ old('phone') }}" 
          required
        >
        @error('phone')
          <span class="form-error">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="callbackComment" class="form-label">Комментарий</label>
        <textarea 
          id="callbackComment" 
          name="comment" 
          class="form-input" 
          rows="3" 
          style="height: auto; padding: 12px 16px;" 
          placeholder="Укажите удобное время для звонка"
        >{{ old('comment') }}</textarea>
        @error('comment')
          <span class="form-error">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="form-submit-btn">Отправить заявку</button>
    </form>
  </div>
</div>
