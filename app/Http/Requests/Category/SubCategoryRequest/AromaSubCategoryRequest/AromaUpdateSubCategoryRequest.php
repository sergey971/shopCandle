<?php

namespace App\Http\Requests\Category\SubCategoryRequest\AromaSubCategoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class AromaUpdateSubCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
            'aroma' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric|min:0',
            'size' => 'nullable|string|max:255',
            'burn_time' => 'nullable|string|max:255',
            'material' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews' => 'nullable|string',
            'discount' => 'nullable|numeric|min:0',
            'wick' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ограничение на размер и тип файла
        ];
    }
    public function messages(): array
{
    return [
        // Общие сообщения
        'required' => 'Поле :attribute обязательно для заполнения.',
        'string' => 'Поле :attribute должно быть строкой.',
        'numeric' => 'Поле :attribute должно быть числом.',
        'min' => 'Поле :attribute должно быть не меньше :min.',
        'max' => 'Поле :attribute не должно превышать :max символов.',
        'in' => 'Выбранное значение для :attribute некорректно.',
        'image' => 'Файл в поле :attribute должен быть изображением.',
        'mimes' => 'Файл в поле :attribute должен быть одного из типов: :values.',

        // Кастомизированные сообщения для конкретных полей
        'name.required' => 'Название свечи обязательно для заполнения.',
        'name.max' => 'Название свечи не должно превышать 255 символов.',
        
        'price.required' => 'Укажите цену свечи.',
        'price.numeric' => 'Цена должна быть числом.',
        'price.min' => 'Цена не может быть отрицательной.',
        
        'status.required' => 'Укажите статус доступности.',
        'status.in' => 'Статус должен быть либо "available", либо "unavailable".',
        
        'aroma.max' => 'Название аромата не должно превышать 255 символов.',
        
        'weight.numeric' => 'Вес должен быть числом.',
        'weight.min' => 'Вес не может быть отрицательным.',
        
        'size.max' => 'Размер не должен превышать 255 символов.',
        
        'burn_time.max' => 'Время горения не должно превышать 255 символов.',
        
        'material.max' => 'Материал не должен превышать 255 символов.',
        
        'color.max' => 'Цвет не должен превышать 255 символов.',
        
        'manufacturer.max' => 'Производитель не должен превышать 255 символов.',
        
        'rating.numeric' => 'Рейтинг должен быть числом.',
        'rating.min' => 'Рейтинг не может быть меньше 0.',
        'rating.max' => 'Рейтинг не может быть больше 5.',
        
        'discount.numeric' => 'Скидка должна быть числом.',
        'discount.min' => 'Скидка не может быть отрицательной.',
        
        'wick.max' => 'Тип фитиля не должен превышать 255 символов.',
        
        'image.image' => 'Загруженный файл должен быть изображением.',
        'image.mimes' => 'Изображение должно быть в формате: jpeg, png, jpg или gif.',
        'image.max' => 'Размер изображения не должен превышать 2MB.',
    ];
}

public function attributes(): array
{
    return [
        'name' => 'Название',
        'description' => 'Описание',
        'price' => 'Цена',
        'status' => 'Статус',
        'aroma' => 'Аромат',
        'weight' => 'Вес',
        'size' => 'Размер',
        'burn_time' => 'Время горения',
        'material' => 'Материал',
        'color' => 'Цвет',
        'manufacturer' => 'Производитель',
        'rating' => 'Рейтинг',
        'reviews' => 'Отзывы',
        'discount' => 'Скидка',
        'wick' => 'Фитиль',
        'image' => 'Изображение',
    ];
}
}
