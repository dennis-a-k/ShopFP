<span type="button" id="dropdownMenuPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ $product->price }} ₽
</span>

<!-- Всплывающее окно -->
<div class="dropdown-menu px-1" style="width: 10rem" aria-labelledby="dropdownMenuPrice">
    <form method="POST" action="{{ route('product.update.price', $product->id) }}">
        @csrf
        @method('PATCH')
        <div class="input-group">
            <input type="number" class="form-control" name="price" value="{{ $product->price }}" min="0.00"
                step="0.01" pattern="^\d+(?:\.\d{5,2})?$" required>
            <div class="input-group-append">
                <button class="btn btn-info btn-sm" type="submit">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </div>
        </div>
        <x-input-error class="ml-2" :messages="$errors->get('price')" />
    </form>
</div>
