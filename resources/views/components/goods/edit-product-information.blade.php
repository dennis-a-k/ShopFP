<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Данные о товаре</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="productTitle">Наименование</label>
                <input type="text" id="productTitle" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                    name="title" value="{{ old('title', $product->title) }}" required autofocus autocomplete="title">
                <x-input-error class="ml-2" :messages="$errors->get('title')" />
            </div>

            <div class="form-group">
                <label for="productArticle">Артикул</label>
                <input type="text" id="productArticle"
                    class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}" name="article"
                    value="{{ old('article', $product->article) }}" required autocomplete="article">
                <x-input-error class="ml-2" :messages="$errors->get('article')" />
            </div>

            <div class="form-group">
                <label for="selectCategories">Категория</label>
                <select class="form-control select2" style="width: 100%;" id="selectCategories" name="category_id"
                    data-dropdown-css-class="select2-info">
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option value="{{ $category->id }}" selected="selected">{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="summernote">Описание</label>
                <textarea class="form-control" id="summernote" name="description">
                    {{ $product->description }}
                </textarea>
            </div>
        </div>
    </div>
</section>
