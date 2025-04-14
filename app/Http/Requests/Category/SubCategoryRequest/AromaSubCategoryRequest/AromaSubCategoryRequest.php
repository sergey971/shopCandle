<?php

namespace App\Http\Requests\Category\SubCategoryRequest\AromaSubCategoryRequest;

use Illuminate\Foundation\Http\FormRequest;

class AromaSubCategoryRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Поле изображения должно быть изображением, допустимыми форматами являются jpeg, png, jpg, gif, максимальный размер 2048 КБ
            'name' => 'nullable|string|max:255', // Поле названия должно быть строкой и не превышать 255 символов
            'description' => 'nullable|string', // Поле описания должно быть строкой
            'price' => 'nullable|numeric|min:0', // Поле цены должно быть числом и не меньше 0
            'category_id' => 'nullable|exists:categories,id', // Поле категории должно существовать в таблице categories
            'status' => 'nullable|string|in:available,unavailable', // Поле статуса должно быть строкой и принимать значения "available" или "unavailable"
            'aroma' => 'nullable|string|max:255', // Поле аромата должно быть строкой и не превышать 255 символов
            'weight' => 'nullable|numeric|min:0', // Поле веса должно быть числом и не меньше 0
            'size' => 'nullable|string|max:255', // Поле размера должно быть строкой и не превышать 255 символов
            'burn_time' => 'nullable|string|max:255', // Поле времени горения должно быть строкой и не превышать 255 символов
            'material' => 'nullable|string|max:255', // Поле материала должно быть строкой и не превышать 255 символов
            'color' => 'nullable|string|max:255', // Поле цвета должно быть строкой и не превышать 255 символов
            'manufacturer' => 'nullable|string|max:255', // Поле производителя должно быть строкой и не превышать 255 символов
            'rating' => 'nullable|numeric|min:0|max:5', // Поле рейтинга должно быть числом от 0 до 5
            'reviews' => 'nullable|string', // Поле отзывов должно быть строкой
            'discount' => 'nullable|numeric|min:0', // Поле скидки должно быть числом и не меньше 0
            'wick' => 'nullable|string|max:255', // Поле фитиля должно быть строкой и не превышать 255 символов
        ];
    }

    /**
     * Сообщения об ошибках для правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'image.max' => 'Размер изображения не должен превышать 2 МБ.',
            'name.max' => 'Название не должно превышать 255 символов.',
            'price.numeric' => 'Цена должна быть числом.',
            'price.min' => 'Цена не может быть отрицательной.',
            'category_id.exists' => 'Указанная категория не существует.',
            'status.in' => 'Статус должен быть либо "available", либо "unavailable".',
            'aroma.max' => 'Описание аромата не должно превышать 255 символов.',
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
            'wick.max' => 'Информация о фитиле не должна превышать 255 символов.',
        ];
    }
}
