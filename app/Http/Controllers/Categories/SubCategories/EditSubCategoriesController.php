<?php

namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ScentedCandle;

class EditSubCategoriesController extends Controller
{
   
    public function __invoke($category, $id)
    {       
        $category = Category::findOrFail($category);
        $subCategories = ScentedCandle::findOrFail($id);
            return view('subcategories.edit', compact('category','subCategories'));
    }
}
