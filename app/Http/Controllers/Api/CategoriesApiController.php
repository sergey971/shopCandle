<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Добавляем фасад Log
use Exception;

class CategoriesApiController extends Controller
{
    public function index()
    {
        try {

            $categories = Category::all();
            return response()->json([
                'success' => true,
                'data' => $categories
            ]);
        } catch (Exception $e) {
             // Логируем ошибку с контекстом
             Log::error('Ошибка при получении списка категорий', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'time' => now()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Произошла ошибка при загрузке категорий'
            ], 500);
        };
    }
}
