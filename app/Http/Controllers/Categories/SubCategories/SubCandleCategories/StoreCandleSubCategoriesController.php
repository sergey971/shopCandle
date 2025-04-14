<?php
namespace App\Http\Controllers\Categories\SubCategories\SubCandleCategories;

use App\Http\Controllers\Controller;
use App\Models\AromaScentedCandle;
use App\Http\Requests\Category\SubCategoryRequest\AromaSubCategoryRequest\AromaSubCategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StoreCandleSubCategoriesController extends Controller
{
    public function __invoke(AromaSubCategoryRequest $request, $category, $id)
    {
        try {
            $validatedData = $request->validated();

            // Логируем успешную валидацию
            Log::info('Данные успешно валидированы', ['data' => $validatedData]);

            // Сохраняем изображение, если оно загружено
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                if ($imagePath) {
                    $validatedData['image'] = $imagePath;
                    Log::info('Изображение успешно загружено', ['path' => $imagePath]);
                } else {
                    Log::warning('Не удалось сохранить изображение');
                }
            }

            // Убедитесь, что scented_candle_id передается
            $validatedData['scented_candle_id'] = $id;

            // Создаем запись в базе данных
            $aromaScentedCandle = AromaScentedCandle::create($validatedData);
            Log::info('Запись успешно создана', ['id' => $aromaScentedCandle->id]);

            // Перенаправляем пользователя
            return redirect()->route('subcandlecategories.index', ['category' => $category, 'id' => $id]);

        } catch (\Exception $e) {
            // Логируем ошибку
            Log::error('Ошибка в StoreCandleSubCategoriesController', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);

            // Возвращаем пользователя обратно с сообщением об ошибке
            return back()->withErrors(['error' => 'Произошла ошибка. Пожалуйста, попробуйте позже.']);
        }
    }


}
