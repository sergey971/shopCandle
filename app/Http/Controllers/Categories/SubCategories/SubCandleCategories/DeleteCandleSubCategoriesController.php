<?php

namespace App\Http\Controllers\Categories\SubCategories\SubCandleCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AromaScentedCandle;
use App\Models\Category;

class DeleteCandleSubCategoriesController extends Controller
{
    public function __invoke(Category $category, $id, $idSubCandle)
    {
        // Логирование для отладки
        logger("Category ID: {$category->id}, SubCategory ID: {$id}, SubCandle ID: {$idSubCandle}");
    
        // Находим AromaScentedCandle по его ID
        $aromaScentedCandle = AromaScentedCandle::find($idSubCandle);
    
        if ($aromaScentedCandle) {
            // Проверяем, что AromaScentedCandle связан с ScentedCandle, который принадлежит Category
            if ($aromaScentedCandle->scentedCandle->category_id === $category->id) {
                $aromaScentedCandle->delete();
                
                return redirect()->route('subcandlecategories.index', ['category' => $category->id, 'id' => $id] );
            }
        }
    }
}

