<?php

namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use App\Models\ScentedCandle;
use App\Models\Category;

class DeleteSubCategoriesController extends Controller
{
    public function __invoke(Category $category, $id)
    {
       
        $scentedCandle = ScentedCandle::findOrfail($id);
      
        $scentedCandle->delete();

        // Перенаправляем на страницу списка подкатегорий
        return redirect()->route('subcategories.index', ['category' => $category->id])->with('success', 'Подкатегория успешно удалена.');
    }
}

