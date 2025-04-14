<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Подкатегория успешно удалена.');
    }
}
