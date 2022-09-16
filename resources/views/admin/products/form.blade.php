<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input type="text" name="nome" value="{{ old('nome', isset($product) ? $product->nome : '') }}"
        class="form-control" id="nome">
</div>
@error('nome')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Descrizione</label>
    <textarea name="description" rows="10" class="form-control" id="description">{{ old('description', isset($product) ? $product->description : '') }}</textarea>
</div>
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Immagine</label>
    <input type="url" name="image" value="{{ old('image', isset($product) ? $product->image : '') }}"
        class="form-control" id="image" placeholder="inserisci url">
</div>
@error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="mb-3">
    <select class="form-select" name="brand_id" aria-label="Default select example">
        @foreach ($brands as $brand)
            <option
                @if (isset($product)) value="{{ old('brand_id', $brand->id) }}" 
            @selected($product->brand_id == $brand->id)
            @else
            value="{{ $brand->id }}" @endif>
                {{ $brand->name_brand }}
            </option>
        @endforeach
        @error('brand_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </select>
</div>
