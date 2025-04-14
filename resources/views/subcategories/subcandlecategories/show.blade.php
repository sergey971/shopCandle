@extends('main.admin')

@section('content')
    <div class="container">
        <h1>{{ $candle->name }}</h1>

        {{-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('subcandlecategories.show', $category, $subCategory, $nameCategor, $candle) }}
        </ol>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $candle->name }}</h5>
                    <p class="card-text">{{ $candle->description }}</p>
                    <p class="card-text"><strong>Цена:</strong> {{ $candle->price }}</p>
                    <p class="card-text"><strong>Статус:</strong> {{ $candle->status }}</p>
                    <p class="card-text"><strong>Аромат:</strong> {{ $candle->aroma }}</p>
                    <p class="card-text"><strong>Вес:</strong> {{ $candle->weight }}</p>
                    <p class="card-text"><strong>Размер:</strong> {{ $candle->size }}</p>
                    <p class="card-text"><strong>Время горения:</strong> {{ $candle->burn_time }}</p>
                    <p class="card-text"><strong>Материал:</strong> {{ $candle->material }}</p>
                    <p class="card-text"><strong>Цвет:</strong> {{ $candle->color }}</p>
                    <p class="card-text"><strong>Производитель:</strong> {{ $candle->manufacturer }}</p>
                    <p class="card-text"><strong>Рейтинг:</strong> {{ $candle->rating }}</p>
                    <p class="card-text"><strong>Отзывы:</strong> {{ $candle->reviews }}</p>
                    <p class="card-text"><strong>Скидка:</strong> {{ $candle->discount . ' %' }} </p>
                    <p class="card-text"><strong>Фитиль:</strong> {{ $candle->wick }}</p>
                    <div class="text-center mb-3">
                        @if($candle->image)
                            <img src="{{ Storage::url($candle->image) }}" alt="Изображение свечи" class="img-fluid" style="max-height: 150px;">
                        @else
                            <p>Изображение отсутствует</p>
                        @endif
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{route('subcandlecategories.edit', ['category' => $category->id, 'id' => $subCategory->id, 'idSubCandle' => $candle->id] )}}" class="btn btn-primary btn-sm">Редактировать</a>
                        <form action="{{ route('subcandlecategories.delete', ['category' => $category->id, 'id' => $subCategory->id, 'idSubCandle' => $candle->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                      
                        
                        
                       
                    </div>
                </div>
            </div>
        </div>
@endsection
