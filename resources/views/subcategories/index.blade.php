@extends('main.admin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории в чем свечи</h1>
                </div><!-- /.col -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        {{ Breadcrumbs::render('subcategories.index', ['category' => $category]) }}
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
                   
                    {{-- <a href="" class="btn btn-primary">Добавить</a> --}}
            
                    <a href="{{route('subcategories.create', ['category' => $category->id])}}" class="btn btn-primary">Добавить</a>

                 
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
                          

                            
                            @foreach($subCategories as $subCategorie)
                        <tr>    
                          <tr>
                            <td>{{ $subCategorie->id }}</td>
                            <td>{{ $subCategorie->name }}</td>
                          </tr>
                            
                            <td>
                                {{-- <a class="btn btn-info" href="{{route('subcategories.show', $subCategorie->id )}}">Смотреть</a> --}}
                                <a class="btn btn-info" href="{{ route('subcandlecategories.index', ['category' => $category->id, 'id' => $subCategorie->id]) }}">Показать</a>

                            </td>
                            
                           

                            <td>
                                <form action="{{ route('subcategories.delete', ['category' => $category->id, 'id' => $subCategorie->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                            <td>
                                <a href="{{route('subcategories.edit', ['category' => $category->id, 'id' => $subCategorie->id])}}" class="btn btn-primary">Редактировать</a>
                                 
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