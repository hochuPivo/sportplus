@extends('layouts.app')

@section('title', 'СПОРТ ПЛЮС — Спортивный магазин')

@section('content')
  @include('partials.hero')
  @include('partials.products')

  <div class="info-sections container">
    @include('partials.about')
    @include('partials.delivery')
    @include('partials.contacts')
  </div>
@endsection
