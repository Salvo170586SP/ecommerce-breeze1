@extends('admin.layout.app')

@section('title','EC_Breeze | DETTAGLIO')
@section('contain')
    <div class="row">
        <div class="col">
            <h1>{{ $product->nome }}</h1>
        </div>
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="card bg-secondary text-ligth mb-3" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ $product->image }}" class="img-fluid rounded-start" alt="{{ $product->nome }}">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h3 class="card-title">{{ $product->nome }}</h3>
                      <hr>
                      <p class="card-text">{{ $product->description }}</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection