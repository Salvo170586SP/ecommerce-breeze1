@extends('admin.layout.app')
@section('title', 'EC_Breeze | PRODOTTI')
@section('contain')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1>Lista Brands</h1>
            <a class="btn btn-primary" href="{{ route('admin.brands.create') }}">Crea Brand</a>
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
                        <th scope="col">Nome</th>
                        <th scope="col">--</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th scope="row">{{ $brand->id }}</th>
                            <td>{{ $brand->name_brand }}</td>
                            <td class="d-flex justify-content-end">
                                <a class="btn btn-sm btn-secondary mx-2" href="{{ route('admin.brands.edit', $brand) }}">Modifica</a>
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Cancella</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
