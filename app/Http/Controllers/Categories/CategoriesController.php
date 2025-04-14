<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        /*
            Здесь используется модель Category для получения всех записей из таблицы electrodes.
            Метод All() возвращает коллекцию всех записей из этой таблицы.
         */
        return view('categories.index', compact('categories'));
            /*
         Функция compact используется для создания массива, где ключи — это имена переменных, а значения — 
         это значения этих переменных. В данном случае, compact('electrodes') создает массив ['electrodes' => $electrodes].
         */ 
    }
}
