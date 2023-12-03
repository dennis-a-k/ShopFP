<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Данные о товаре</h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div>
                    <label for="inputArticle">Артикул</label>
                    <input type="text" id="inputArticle"
                        class="form-control {{ $errors->has('article') ? 'is-invalid' : '' }}" name="article"
                        value="{{ old('article') }}" required autofocus autocomplete="article">
                    <x-input-error class="ml-2" :messages="$errors->get('article')" />
                </div>
            </div>

            <div class="form-group">
                <div>
                    <label for="inputTitle">Наименование</label>
                    <input type="text" id="inputTitle"
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title"
                        value="{{ old('title') }}" required autocomplete="title">
                    <x-input-error class="ml-2" :messages="$errors->get('title')" />
                </div>
            </div>

            <div class="form-group">
                <label for="selectCategories">Категория</label>
                <select class="form-control select2" style="width: 100%;" id="selectCategories" name="category_id">
                    <option selected="selected" disabled>Выберете категорию</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="summernote">Описание</label>
                <textarea class="form-control" id="summernote" name="description"></textarea>
            </div>
        </div>
    </div>
</section>
