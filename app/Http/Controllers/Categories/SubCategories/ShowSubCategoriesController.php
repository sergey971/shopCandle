<?php

namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use App\Models\ScentedCandle;
use App\Models\Category;

class ShowSubCategoriesController extends Controller
{
    public function __invoke($categoryId, $subcategoryId)
    {
        // Найдите категорию по её идентификатору
        $category = Category::findOrFail($categoryId);

        // Найдите субкатегорию по её идентификатору
        $subcategory = ScentedCandle::findOrFail($subcategoryId);


        // Передайте данные в представление
        return view('subcategories.show', compact('category', 'subcategory'));
    }
}
