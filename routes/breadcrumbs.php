<?php

// Главная
Breadcrumbs::for('categories.index', function ($trail) {
    $trail->push('Главная', route('categories.index'));
});

// Подкатегории
Breadcrumbs::for('subcategories.index', function ($trail, $category) {
    $trail->parent('categories.index');
    $trail->push('Подкатегория', route('subcategories.index', $category));
});

// Хлебные крошки для subcandlecategories.index
Breadcrumbs::for('subcandlecategories.index', function ( $trail, $category, $subCategory) {
    $trail->parent('subcategories.index', $category);
    $trail->push($subCategory->name, route('subcandlecategories.index', [$category->id, $subCategory->id]));
});

Breadcrumbs::for('subcandlecategories.show', function ($trail, $category, $subCategory, $nameCategor, $candle) {
    $trail->parent('subcategories.index', $category);
    $trail->push($nameCategor, route('subcandlecategories.index', [$category->id, $subCategory->id]));
    $trail->push($candle->name, route('subcandlecategories.show', [$category->id, $subCategory->id, $candle->id]));
});