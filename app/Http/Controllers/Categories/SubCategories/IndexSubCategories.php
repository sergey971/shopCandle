<?php

namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ScentedCandle;
use App\Models\Aroma;

class IndexSubCategories extends Controller
{
    public function __invoke($categoryId)
    {
        // Получение категории по идентификатору
        $category = Category::findOrFail($categoryId);

        // Получение ароматических свечей, связанных с этой категорией
        $subCategories = $category->scentedCandles()->get();
       
        /*
        Здесь используется модель Category для получения категории по идентификатору.
        Метод findOrFail возвращает категорию или выбрасывает исключение, если категория не найдена.
        Метод scentedCandles возвращает все ароматические свечи, связанные с этой категорией.
        Метод get выполняет запрос и возвращает коллекцию записей, соответствующих условию.
        */
        // Передача категории и подкатегорий в представление subcategories.index.blade.php
        // И отображение представления с полученными данными
        return view('subcategories.index', compact('category', 'subCategories'));
        
    }
}
