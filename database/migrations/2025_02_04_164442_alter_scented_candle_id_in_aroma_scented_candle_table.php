<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterScentedCandleIdInAromaScentedCandleTable extends Migration
{
    public function up()
    {
        Schema::table('aroma_scented_candle', function (Blueprint $table) {
            $table->unsignedBigInteger('scented_candle_id')->nullable(false)->change();
        });
    }

    public function down()
    {
        Schema::table('aroma_scented_candle', function (Blueprint $table) {
            $table->unsignedBigInteger('scented_candle_id')->nullable()->change();
        });
    }
}