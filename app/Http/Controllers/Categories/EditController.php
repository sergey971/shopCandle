<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class EditController extends Controller
{
    public function __invoke(Category $category){
        return view('categories.edit', compact('category'));
    }
}
