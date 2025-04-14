<?php

namespace App\Http\Controllers\Categories\SubCategories\SubCandleCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AromaScentedCandle;
use App\Models\Category;
use App\Models\ScentedCandle;

class EditCandleSubCategoriesController extends Controller
{
    public function __invoke($category, $id, $idSubCandle){

        $category = Category::findorFail($category);
        $subCategory = ScentedCandle::findorFail($id);
        $candle = AromaScentedCandle::findorFail($idSubCandle);
        return view('subcategories.subcandlecategories.edit',compact('category', 'subCategory', 'candle'));

    }
}
