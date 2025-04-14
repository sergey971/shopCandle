<?php

namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\SubCategoryRequest\UpdateSubCategoryRequest;
use App\Models\ScentedCandle;
use App\Models\Category;

use Illuminate\Auth\Events\Validated;

class UpdateSubCategoriesController extends Controller
{
    public function __invoke(UpdateSubCategoryRequest $request, $category, $id)
    {
        $category = Category::findOrFail($category);
        $subCategory = ScentedCandle::findOrFail($id);
        $data = $request->validated();
        $subCategory->update($data);
        return redirect()->route('subcategories.index', ['category' => $category->id]);
    }
}