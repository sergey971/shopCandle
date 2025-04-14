<?php

namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ScentedCandle;

class StoreSubCategoriesController extends Controller
{
    public function __invoke(Request $request, $categoryId)
    {

        // Получение категории по идентификатору
        $category = Category::findOrFail($categoryId);

        // Создание новой подкатегории (ароматической свечи)
        $scentedCandle = new ScentedCandle([
            'name' => $request->input('name'),
        ]);

        // Привязка подкатегории к категории
        $category->scentedCandles()->save($scentedCandle);

        // Перенаправление на страницу с подкатегориями
        return redirect()->route('subcategories.index', ['category' => $category->id]);
    }
}

