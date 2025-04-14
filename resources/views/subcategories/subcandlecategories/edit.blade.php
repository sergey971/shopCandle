@extends('main.admin')

@section('content')
    <div class="container">
        <h1>Редактировать ароматическую свечу</h1>

        {{-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

        <form
            action="{{ route('subcandlecategories.update', ['category' => $category->id, 'id' => $subCategory->id, 'idSubCandle' => $candle->id]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" value="  {{ old('description', $candle->name) }}" id="name" class="form-control"
                    required>
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control">
                    {{ old('description', $candle->description) }}
                </textarea>
                @error('description')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" value="{{ old('price', $candle->price) }}" id="price"
                    class="form-control" min="0" step="0.01">
                @error('price')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control">
                    <option value="available" {{ old('status', $candle->available) == 'available' ? 'selected' : '' }}>
                        Доступно</option>
                    <option value= "unavailable"
                        {{ old('status', $candle->unavailable) == 'unavailable' ? 'selected' : '' }}>Недоступно</option>
                </select>
                @error('status')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="aroma">Аромат</label>
                <input type="text" name="aroma" value="{{ old('aroma', $candle->aroma) }}" id="aroma"
                    class="form-control" maxlength="255">
                @error('aroma')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="weight">Вес</label>
                <input type="number" name="weight" value="{{ old('weight', $candle->weight) }}" id="weight"
                    class="form-control" min="0" step="0.01">
            </div>
            <div class="form-group">
                <label for="size">Размер</label>
                <input type="text" name="size" value="{{ old('size', $candle->size) }}" id="size"
                    class="form-control" maxlength="255">
                @error('size')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="burn_time">Время горения</label>
                <input type="text" name="burn_time" value="{{ old('burn_time', $candle->burn_time) }}" id="burn_time"
                    class="form-control" maxlength="255">
                @error('burn_time')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="material">Материал</label>
                <input type="text" name="material" value="{{ old('material', $candle->material) }}" id="material"
                    class="form-control" maxlength="255">
                @error('material')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="color">Цвет</label>
                <input type="text" name="color" value="{{ old('color', $candle->color) }}" id="color"
                    class="form-control" maxlength="255">
                @error('color')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="manufacturer">Производитель</label>
                <input type="text" name="manufacturer" value="{{ old('manufacturer', $candle->manufacturer) }}"
                    id="manufacturer" class="form-control" maxlength="255">
                @error('manufacturer')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="rating">Рейтинг</label>
                <input type="number" name="rating" value="{{ old('rating', $candle->rating) }}" id="rating"
                    class="form-control" min="0" max="5" step="0.1">
                @error('rating')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="reviews">Отзывы</label>
                <textarea name="reviews" id="reviews" class="form-control">{{ old('reviews', $candle->reviews) }}</textarea>
                @error('reviews')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="discount">Скидка</label>
                <input type="number" name="discount" value="{{ old('discount', $candle->discount) }}" id="discount"
                    class="form-control" min="0" step="0.01">
                @error('discount')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="wick">Фитиль</label>
                <input type="text" name="wick" value="{{ old('wick', $candle->wick) }}" id="wick"
                    class="form-control" maxlength="255">
                @error('wick')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                @if ($candle->image)
                    <div>
                        <img src="{{ Storage::url($candle->image) }}" alt="Current Image"
                            style="max-width: 200px; margin-bottom: 10px;">
                    </div>
                @endif
                <input type="file" name="image" id="image" class="form-control">
                @error('image')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Редактировать</button>
            <div class="">
                <a href="{{route('subcandlecategories.index', ['category'=>$category->id, 'id'=>$subCategory->id])}}">Назад</a>
            </div>
        </form>
    </div>
@endsection
