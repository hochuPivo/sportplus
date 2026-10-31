<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'СПОРТ ПЛЮС — Спортивный магазин')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600&family=Montserrat:wght@400;500;600;700;800&family=Unbounded:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}">

  <style>
    .flash-toast {
        position: fixed;
        bottom: 24px;
        right: 24px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 12px;
        max-width: 420px;
    }
    .alert-card {
        padding: 16px 20px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 500;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        animation: slideInRight 0.3s ease;
    }
    .alert-card--success { background-color: #10B981; }
    .alert-card--info { background-color: #3B82F6; }
    .alert-card--danger { background-color: #EF4444; }
    .alert-close {
        color: #fff;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        opacity: 0.8;
    }
    .alert-close:hover { opacity: 1; }

    .modal-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        z-index: 1000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }
    .modal-overlay.active { display: flex; }
    .modal-window {
        background: #fff;
        border-radius: 20px;
        width: 100%;
        max-width: 480px;
        padding: 32px;
        position: relative;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        animation: scaleUp 0.25s ease;
    }
    .modal-close-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #F4F5F7;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
        color: #7F8286;
    }
    .modal-close-btn:hover { background: #EAEAEA; color: #1F2937; }
    .modal-title {
        font-family: var(--font-display);
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 8px;
    }
    .modal-subtitle {
        color: #7F8286;
        font-size: 14px;
        margin-bottom: 24px;
        line-height: 1.4;
    }
    .form-group {
        margin-bottom: 16px;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .form-label {
        font-size: 13px;
        font-weight: 600;
        color: #1F2937;
    }
    .form-input {
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        border: 1px solid #E5E7EB;
        font-size: 14px;
        font-family: inherit;
        background: #F9FAFB;
        transition: border-color 0.2s;
    }
    .form-input:focus {
        border-color: #FF8114;
        background: #fff;
    }
    .form-error {
        color: #EF4444;
        font-size: 12px;
        font-weight: 500;
    }
    .form-submit-btn {
        width: 100%;
        padding: 14px;
        background: #FF8114;
        color: #fff;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        margin-top: 8px;
        transition: background 0.2s;
    }
    .form-submit-btn:hover {
        background: #e5700a;
    }

    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    @keyframes scaleUp {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body class="page">

  <div class="flash-toast">
    @if (session('success'))
      <div class="alert-card alert-card--success" role="alert">
        <span>{{ session('success') }}</span>
        <button type="button" class="alert-close" onclick="this.parentElement.remove()">&times;</button>
      </div>
    @endif

    @if (session('cart_success'))
      <div class="alert-card alert-card--success" role="alert">
        <span>{{ session('cart_success') }}</span>
        <button type="button" class="alert-close" onclick="this.parentElement.remove()">&times;</button>
      </div>
    @endif

    @if (session('info'))
      <div class="alert-card alert-card--info" role="alert">
        <span>{{ session('info') }}</span>
        <button type="button" class="alert-close" onclick="this.parentElement.remove()">&times;</button>
      </div>
    @endif

    @if ($errors->any())
      <div class="alert-card alert-card--danger" role="alert">
        <div>
          <strong>Пожалуйста, исправьте ошибки:</strong>
          <ul style="margin-top: 4px; padding-left: 16px; font-size: 13px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        <button type="button" class="alert-close" onclick="this.parentElement.remove()">&times;</button>
      </div>
    @endif
  </div>

  @include('partials.topbar')
  @include('partials.header')

  <main class="main">
    @yield('content')
  </main>

  @include('partials.footer')
  @include('partials.callback-modal')

  <script type="module" src="{{ asset('js/main.js') }}"></script>

  <script>
    function openCallbackModal() {
        document.getElementById('callbackModal').classList.add('active');
    }
    function closeCallbackModal() {
        document.getElementById('callbackModal').classList.remove('active');
    }

    @if ($errors->any())
        document.addEventListener('DOMContentLoaded', function() {
            openCallbackModal();
        });
    @endif
  </script>
</body>
</html>
