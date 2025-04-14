<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('aroma_scented_candle', function (Blueprint $table) {
            $table->string('name')->nullable(); // Название ароматической свечи или аромата
            $table->text('description')->nullable(); // Описание ароматической свечи или аромата
            $table->decimal('price', 8, 2)->nullable(); // Цена ароматической свечи или аромата
            $table->unsignedBigInteger('category_id')->nullable(); // Идентификатор категории, к которой принадлежит ароматическая свеча или аромат
            $table->string('image')->nullable(); // URL или путь к изображению ароматической свечи или аромата
            $table->string('status')->default('unavailable'); // Статус ароматической свечи или аромата (доступна или недоступна)
            $table->string('aroma')->nullable(); // Описание аромата ароматической свечи
            $table->decimal('weight', 8, 2)->nullable(); // Вес ароматической свечи
            $table->string('size')->nullable(); // Размер ароматической свечи (например, диаметр и высота)
            $table->string('burn_time')->nullable(); // Время горения ароматической свечи
            $table->string('material')->nullable(); // Материал, из которого сделана ароматическая свеча (например, воск, парафин)
            $table->string('color')->nullable(); // Цвет ароматической свечи
            $table->string('manufacturer')->nullable(); // Производитель или бренд ароматической свечи
            $table->decimal('rating', 2, 1)->nullable(); // Рейтинг ароматической свечи (например, от 1 до 5 звезд)
            $table->text('reviews')->nullable(); // Отзывы пользователей о ароматической свече
            $table->decimal('discount', 8, 2)->nullable(); // Скидка на ароматическую свечу (в процентах или в денежном выражении)
            $table->string('wick')->nullable(); // Информация о фитиле ароматической свечи
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('aroma_scented_candle', function (Blueprint $table) {
            $table->dropColumn('name'); // Удаление поля для названия
            $table->dropColumn('description'); // Удаление поля для описания
            $table->dropColumn('price'); // Удаление поля для цены
            $table->dropColumn('category_id'); // Удаление поля для идентификатора категории
            $table->dropColumn('image'); // Удаление поля для изображения
            $table->dropColumn('status'); // Удаление поля для статуса
            $table->dropColumn('aroma'); // Удаление поля для описания аромата
            $table->dropColumn('weight'); // Удаление поля для веса
            $table->dropColumn('size'); // Удаление поля для размера
            $table->dropColumn('burn_time'); // Удаление поля для времени горения
            $table->dropColumn('material'); // Удаление поля для материала
            $table->dropColumn('color'); // Удаление поля для цвета
            $table->dropColumn('manufacturer'); // Удаление поля для производителя
            $table->dropColumn('rating'); // Удаление поля для рейтинга
            $table->dropColumn('reviews'); // Удаление поля для отзывов
            $table->dropColumn('discount'); // Удаление поля для скидки
            $table->dropColumn('wick'); // Удаление поля для фитиля
        });
    }
};
