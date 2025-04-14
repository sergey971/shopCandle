<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Aroma;
use App\Models\ScentedCandle;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (auth()->check()) {
        return view('main.index', ['user' => auth()->user()]);
    }
    return redirect('/login');
});

// Главная
// Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

// Категории
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', \App\Http\Controllers\Categories\CategoriesController::class)->name('categories.index');
    Route::get('/create', \App\Http\Controllers\Categories\CreateController::class)->name('categories.create');
    Route::post('/store', \App\Http\Controllers\Categories\StoreController::class)->name('categories.store');
    Route::delete('/{category}', \App\Http\Controllers\Categories\DeleteController::class)->name('categories.delete');
    Route::get('/{category}', \App\Http\Controllers\Categories\EditController::class)->name('categories.edit');
    Route::patch('/{category}', \App\Http\Controllers\Categories\UpdateController::class)->name('categories.update');
    // СубКатегории
    Route::group(['prefix' => '{category}/subcategories'], function () {
        Route::get('/create', \App\Http\Controllers\Categories\SubCategories\CreateSubCategories::class)->name('subcategories.create');
        Route::get('/', \App\Http\Controllers\Categories\SubCategories\IndexSubCategories::class)->name('subcategories.index');
        Route::get('/edit/{id}', \App\Http\Controllers\Categories\SubCategories\EditSubCategoriesController::class)->name('subcategories.edit');
        Route::post('/store', \App\Http\Controllers\Categories\SubCategories\StoreSubCategoriesController::class)->name('subcategories.store');
        Route::delete('/{id}', \App\Http\Controllers\Categories\SubCategories\DeleteSubCategoriesController::class)->name('subcategories.delete');
        Route::patch('/{id}', \App\Http\Controllers\Categories\SubCategories\UpdateSubCategoriesController::class)->name('subcategories.update');
    });
      // СубКатегорииАроматов
      Route::group(['prefix' => '{category}/subcategories/{id}/subcandlecategories'], function () {
        Route::get('/', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\IndexCandleSubCategoriesController::class)->name('subcandlecategories.index');
        Route::get('/create', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\CreateCandleSubController::class)->name('subcandlecategories.create');
        Route::get('/edit/{idSubCandle}', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\EditCandleSubCategoriesController::class)->name('subcandlecategories.edit');
        Route::get('/show/{idSubCandle}', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\ShowCandleSubCategoriesController::class)->name('subcandlecategories.show');
        Route::post('/store', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\StoreCandleSubCategoriesController::class)->name('subcandlecategories.store');
        Route::delete('/{idSubCandle}', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\DeleteCandleSubCategoriesController::class)->name('subcandlecategories.delete');
        Route::patch('/{idSubCandle}', \App\Http\Controllers\Categories\SubCategories\SubCandleCategories\UpdateCandleSubCategoriesController::class)->name('subcandlecategories.update');
    });
    

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
