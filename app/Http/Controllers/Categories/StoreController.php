<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstorCreate($data);
        /*
    Метод firstOrCreate в Laravel используется для поиска записи 
    в базе данных по заданным атрибутам и создания новой записи,
    если такая запись не найдена. Это удобный способ обеспечить,
     что запись существует в базе данных, не выполняя отдельных 
    операций поиска и создания.
        */
        return redirect()->route('categories.index');
    }
}