<?php

namespace App\Http\Controllers\Categories\SubCategories\SubCandleCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ScentedCandle;
use App\Models\AromaScentedCandle;

class IndexCandleSubCategoriesController extends Controller
{
    public function __invoke($categoryId, $id)
{
    $category = Category::findOrFail($categoryId);
    $subCategory = ScentedCandle::findOrFail($id);
    $aromaScentedCandles = $subCategory->aromaScentedCandles()->get();

    // Временная проверка

    return view('subcategories.subcandlecategories.index', compact('category', 'subCategory', 'aromaScentedCandles'));
}
}