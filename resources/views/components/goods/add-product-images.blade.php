<section class="col-md-6">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">
                Фото товара
                <i class="far fa-question-circle text-info images"></i>
            </h3>
        </div>

        <div class="card-body">
            <div class="form-group">
                <label for="customFile">Главное фото</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile"
                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">Загрузите фото</label>
                    <x-input-error class="ml-2" :messages="$errors->get('imgs.0')" />
                </div>
            </div>

            <div class="form-group">
                <label for="file2">Фото №2</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file2"
                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                    <label class="custom-file-label" for="file2" data-browse="Выбрать">Загрузите фото</label>
                    <x-input-error class="ml-2" :messages="$errors->get('imgs.1')" />
                </div>
            </div>

            <div class="form-group">
                <label for="file3">Фото №3</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file3"
                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                    <label class="custom-file-label" for="file3" data-browse="Выбрать">Загрузите фото</label>
                    <x-input-error class="ml-2" :messages="$errors->get('imgs.2')" />
                </div>
            </div>

            <div class="form-group">
                <label for="file4">Фото №4</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file4"
                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                    <label class="custom-file-label" for="file4" data-browse="Выбрать">Загрузите фото</label>
                    <x-input-error class="ml-2" :messages="$errors->get('imgs.3')" />
                </div>
            </div>

            <div class="form-group">
                <label for="file5">Фото №5</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file5"
                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                    <label class="custom-file-label" for="file5" data-browse="Выбрать">Загрузите фото</label>
                    <x-input-error class="ml-2" :messages="$errors->get('imgs.4')" />
                </div>
            </div>

            <div class="form-group">
                <label for="file6">Фото №6</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file6"
                        accept="image/png, image/jpeg, image/jpg, image/webp" name="imgs[]">
                    <label class="custom-file-label" for="file6" data-browse="Выбрать">Загрузите фото</label>
                    <x-input-error class="ml-2" :messages="$errors->get('imgs.5')" />
                </div>
            </div>
        </div>
    </div>
</section>
