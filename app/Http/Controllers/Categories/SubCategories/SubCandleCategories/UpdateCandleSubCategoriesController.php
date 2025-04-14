<?php

namespace App\Http\Controllers\Categories\SubCategories\SubCandleCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\SubCategoryRequest\AromaSubCategoryRequest\AromaUpdateSubCategoryRequest;
use App\Models\AromaScentedCandle;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\ScentedCandle;
use Illuminate\Support\Facades\Log;


class UpdateCandleSubCategoriesController extends Controller
{
    public function __invoke(AromaUpdateSubCategoryRequest $request, $category, $id, $idSubCandle)
    {
        // Находим категорию, подкатегорию и свечу
        $category = Category::findOrFail($category);
        $subCategory = ScentedCandle::findOrFail($id);
        $candle = AromaScentedCandle::findOrFail($idSubCandle);

        try {

            // Валидируем данные
            $data = $request->validated();
            Log::info('Данные успешно валидированны', ['data' => $data]);
            // Обработка изображения
            if ($request->hasFile('image')) {
                // Удаляем старое изображение, если оно есть
                if ($candle->image && Storage::exists('public/' . $candle->image)) {
                    Storage::delete('public/' . $candle->image);
                }

                // Сохраняем новое изображение
                $imagePath = $request->file('image')->store('images', 'public');
                if ($imagePath) {
                    $data['image'] = $imagePath;
                    Log::info('Изображение успешно загружено', ['imagePath' => $imagePath]);
                } else {
                    return back()->with('error', 'Ошибка при загрузке изображения');
                }
            }
            // Обновляем данные свечи
            $candle->update($data);


            // Редирект на страницу списка
            return redirect()->route('subcandlecategories.index', [
                'category' => $category->id,
                'id' => $subCategory->id,
            ])->with('success', 'Свеча успешно обновлена!'); // Добавляем сообщение об успехе
        } catch (\Exception $e) {
            $controllerName = class_basename($this);
            Log::error(
                'Ошибка в ' . $controllerName,
                [
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'file' => $e->getFile(),
                    'trace' => $e->getTraceAsString()
                ]
            );
        }
    }
}
