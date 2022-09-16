@extends('admin.layout.app')

@section('title', 'EC_Breeze | CREA')

@section('contain')
    <div class="row">
        <div class="col">
            <h1>Modifica Brand</h1>
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
            <form action="{{ route('admin.brands.update', $brand) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome brand</label>
                    <input type="text" name="name_brand" value="{{ old('name_brand', $brand->name_brand) }}" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                @error('name_brand')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary">Modifica</button>
            </form>
        </div>
    </div>
@endsection