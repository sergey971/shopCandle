<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AromaScentedCandle extends Model
{
    protected $table = 'aroma_scented_candle';
    protected $guarded = false;

    public function scentedCandle()
    {
        return $this->belongsTo(ScentedCandle::class, 'scented_candle_id');
    }

    public function aroma()
    {
        return $this->belongsTo(Aroma::class);
    }
}