<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aroma extends Model
{
    protected $fillable = ['name'];

    public function scentedCandles()
    {
        return $this->belongsToMany(ScentedCandle::class, 'aroma_scented_candle');
    }
}