@extends('main.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('categories.index') }}
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
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Добавить</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $categorie)
                        <tr>
                            <td>{{$categorie->id}}</td>
                            <td>{{$categorie->name}}</td>
                            <td><a class="btn btn-info" href="{{ route('subcategories.index', $categorie->id) }}">Смотреть</a></td>


                            <td>
                                <form action="{{route('categories.delete', $categorie->id)}}" method="POST">
                                    <input type="submit" value="Удалить" class="btn btn-danger">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $categorie->id)}}" class="btn btn-primary">Редактировать</a>
                                 
                            </td>
                        </tr>
                       @endforeach
                     
                        </tbody>
                    </table>
                </div>
                {{-- @if (session('success')) --}}
    {{-- <div class="alert alert-success"> --}}
        {{-- {{ session('success') }} --}}
    {{-- </div> --}}
{{-- @endif --}}
            {{-- </div> --}}
            <!-- /.row -->
        {{-- </div><!-- /.container-fluid --> --}}
    </section>
    <!-- /.content -->
@endsection