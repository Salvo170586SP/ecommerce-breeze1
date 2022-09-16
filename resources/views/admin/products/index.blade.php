@extends('admin.layout.app')
@section('title', 'EC_Breeze | PRODOTTI')
@section('contain')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1>Lista prodotti</h1>
            <a class="btn btn-secondary mx-2" href="{{ route('admin.products.create') }}">Crea Prodotto</a>

        </div>
        <div class="col-12">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
        </div>
        <div class="col-12">
            <table class="table table-dark table-striped shadow">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">-</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Brand</th>
                        <th scope="col">--</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td><img width="80" height="80" src="{{ $product->image }}" alt="{{ $product->nome }}">
                            </td>
                            <td>{{ $product->nome }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->brand->name_brand ?? '-'}}</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.products.show', $product) }}">Vedi</a>
                                <a class="btn btn-sm btn-secondary mx-2"
                                    href="{{ route('admin.products.edit', $product) }}">Modifica</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Cancella</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
