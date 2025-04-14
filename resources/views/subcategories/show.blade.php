@extends('main.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Вид свечи</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- Добавьте элементы навигации, если необходимо -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card-header">
                    <a href="" class="btn btn-primary">Добавить</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Описание</th>
                                {{-- <th>Цена</th>
                                <th>Категория</th>
                                <th>Изображение</th>
                                <th>Статус</th>
                                <th>Аромат</th>
                                <th>Вес</th>
                                <th>Размер</th>
                                <th>Время горения</th>
                                <th>Материал</th>
                                <th>Цвет</th>
                                <th>Производитель</th>
                                <th>Рейтинг</th>
                                <th>Отзывы</th>
                                <th>Скидка</th>
                                <th>Фитиль</th>
                                <th>Действия</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                {{-- <td>{{ $subcategory->id }}</td> --}}
                                {{-- <td>{{ $subcategory->name }}</td> --}}
                                {{-- <td>{{ $subcategory->description }}</td>
                                <td>{{ $subcategory->price }}</td>
                                <td>{{ $subcategory->category->name }}</td>
                                <td><img src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->name }}" width="100"></td>
                                <td>{{ $subcategory->status }}</td>
                                <td>{{ $subcategory->aroma }}</td>
                                <td>{{ $subcategory->weight }}</td>
                                <td>{{ $subcategory->size }}</td>
                                <td>{{ $subcategory->burn_time }}</td>
                                <td>{{ $subcategory->material }}</td>
                                <td>{{ $subcategory->color }}</td>
                                <td>{{ $subcategory->manufacturer }}</td>
                                <td>{{ $subcategory->rating }}</td>
                                <td>{{ $subcategory->reviews }}</td>
                                <td>{{ $subcategory->discount }}</td>
                                <td>{{ $subcategory->wick }}</td> --}}
                                <td>
                                    <a class="btn btn-info" href="">Смотреть</a>
                                    <form action="" method="POST" style="display:inline;">
                                        <input type="submit" value="Удалить" class="btn btn-danger">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <a href="" class="btn btn-primary">Редактировать</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
