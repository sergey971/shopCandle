<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log; // Добавляем фасад Log
use App\Http\Resources\CategoryResource;
use Exception;

class CategoriesApiController extends Controller
{
    public function index(Request $request)
    {
        $categories  = Cache::remember('scented_candles', 3600, function () use ($request) {
            $query = Category::with(['scentedCandles']); // Изменили отношение
    
            if ($request->has('sort')) {
                $query->orderBy($request->sort);
            }
    
            return $query->get(); // Убрал пагинацию для простоты
        });
    
        return response()->json([
            'success' => true,
            'data' => CategoryResource::collection($categories)
        ]);
    }
    
}
