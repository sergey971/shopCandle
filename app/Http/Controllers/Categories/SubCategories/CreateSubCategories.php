<?php
namespace App\Http\Controllers\Categories\SubCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CreateSubCategories extends Controller
{
    public function __invoke($categoryId)
    {       
        // Получение категории по идентификатору
        $category = Category::findOrFail($categoryId);
        
        // Отображение формы создания подкатегории
        return view('subcategories.create', compact('category'));
    }
}