@extends('main.admin')

@section('content')
    <div class="container">
        <h1>Создать новую ароматическую свечу</h1>

        {{-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}

        <form action="{{ route('subcandlecategories.store', ['category' => $category->id, 'id' => $subcategory->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" id="name" class="form-control" value="" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" name="price" id="price" class="form-control" min="0" step="0.01">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select name="status" id="status" class="form-control">
                    <option value="available">Доступно</option>
                    <option value="unavailable">Недоступно</option>
                </select>
            </div>
            <div class="form-group">
                <label for="aroma">Аромат</label>
                <input type="text" name="aroma" id="aroma" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="weight">Вес</label>
                <input type="number" name="weight" id="weight" class="form-control" min="0" step="0.01">
            </div>
            <div class="form-group">
                <label for="size">Размер</label>
                <input type="text" name="size" id="size" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="burn_time">Время горения</label>
                <input type="text" name="burn_time" id="burn_time" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="material">Материал</label>
                <input type="text" name="material" id="material" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="color">Цвет</label>
                <input type="text" name="color" id="color" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="manufacturer">Производитель</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="rating">Рейтинг</label>
                <input type="number" name="rating" id="rating" class="form-control" min="0" max="5" step="0.1">
            </div>
            <div class="form-group">
                <label for="reviews">Отзывы</label>
                <textarea name="reviews" id="reviews" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="discount">Скидка</label>
                <input type="number" name="discount" id="discount" class="form-control" min="0" step="0.01">
            </div>
            <div class="form-group">
                <label for="wick">Фитиль</label>
                <input type="text" name="wick" id="wick" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
