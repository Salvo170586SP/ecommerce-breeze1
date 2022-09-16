@extends('admin.layout.app')

@section('title', 'EC_Breeze | MODIFICA')

@section('contain')
    <div class="row">
        <div class="col">
            <h1>Modifica prodotti</h1>
        </div>
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-12">
            <form action="{{ route('admin.products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.products.form')

                <button type="submit" class="btn btn-primary">Modifica</button>
            </form>
        </div>
    @endsection
