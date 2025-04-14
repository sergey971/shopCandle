<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('categories.index');
    }
}
