<?php

namespace App\Http\Controllers\Categories\SubCategories\SubCandleCategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ScentedCandle;
use Illuminate\Http\Request;

class CreateCandleSubController extends Controller
{
    public function __invoke($categoryId, $subcategoryId)
    {
        // Найдите категорию и подкатегорию по их идентификаторам
        $category = Category::findOrFail($categoryId);
        $subcategory = ScentedCandle::findOrFail($subcategoryId);

        // Получите связанные ароматические свечи
        $aromaScentedCandles = $subcategory->aromaScentedCandles;

        // Временная проверка данных
        // dd($category, $subcategory, $aromaScentedCandles);

        // Передайте данные в представление
        return view('subcategories.subcandlecategories.create', compact('category', 'subcategory', 'aromaScentedCandles'));
    }
}