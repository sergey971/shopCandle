<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ScentedCandle extends Model
{
    protected $table = 'scented_candles';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function aromaScentedCandles()
    {
        return $this->hasMany(AromaScentedCandle::class, 'scented_candle_id');
    }
}
