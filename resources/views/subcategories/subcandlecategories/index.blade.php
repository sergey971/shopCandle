@extends('main.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ароматы свечи в стакане</h1>
                </div><!-- /.col -->
                <ol class="breadcrumb float-sm-right">
                    {{ Breadcrumbs::render('subcandlecategories.index', $category, $subCategory) }}
                </ol>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('subcandlecategories.create', ['category' => $category->id, 'id' => $subCategory->id]) }}" class="btn btn-primary">
                                Создать подкатегорию свечей
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                @foreach($aromaScentedCandles as $candle)
                                    <div class="col-md-4 col-sm-6 mb-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $candle->name }}</h5>
                                                <p class="card-text">{{ $candle->description }}</p>
                                                <p class="card-text"><strong>Цена:</strong> {{ $candle->price }}</p>
                                                {{-- <p class="card-text"><strong>Категория:</strong> {{ $candle->category->name ?? 'Нет категории' }}</p>
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
                                                <p class="card-text"><strong>Скидка:</strong> {{ $candle->discount }}</p>
                                                <p class="card-text"><strong>Фитиль:</strong> {{ $candle->wick }}</p> --}}
                                                <div class="text-center mb-3">
                                                    @if($candle->image)
                                                        <img src="{{ Storage::url($candle->image) }}" alt="Изображение свечи" class="img-fluid" style="max-height: 150px;">
                                                    @else
                                                        <p>Изображение отсутствует</p>
                                                    @endif
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <a class="btn btn-info btn-sm" href="{{route('subcandlecategories.show', ['category' => $category->id, 'id' => $subCategory->id, 'idSubCandle' => $candle->id])}}">Показать</a>
                    
                                                    <form action="{{ route('subcandlecategories.delete', ['category' => $category->id, 'id' => $subCategory->id, 'idSubCandle' => $candle->id]) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                                                    </form>
                                                  
                                                    
                                                    
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
