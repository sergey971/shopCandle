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
        Schema::create('scented_candles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            /*
            

        $table->foreign('category_id'):
        Этот метод указывает, что столбец category_id в текущей таблице будет внешним ключом.

        ->references('id'):
        Этот метод указывает, что внешний ключ category_id ссылается на столбец id в другой таблице.

        ->on('categories'):
        Этот метод указывает, что внешний ключ category_id ссылается на таблицу categories.

        ->onDelete('cascade'):
        Этот метод указывает, что при удалении записи в таблице categories, все связанные записи в текущей 
        таблице (например, scented_candles) также будут автоматически удалены. Это называется "каскадным удалением".

            */
        });
    }

    public function down()
    {
        Schema::dropIfExists('scented_candles');
    }
};
