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
        Schema::create('aroma_scented_candle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scented_candle_id')->nullable(false);
            $table->unsignedBigInteger('aroma_id');
            $table->timestamps();

            $table->foreign('scented_candle_id')->references('id')->on('scented_candles')->onDelete('cascade');
            $table->foreign('aroma_id')->references('id')->on('aromas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aroma_scented_candle');
    }
};
