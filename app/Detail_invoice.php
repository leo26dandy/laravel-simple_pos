<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_invoice extends Model
{
    //
    protected $guarded = [];

    public function getSubtotalAttribute()
    {
        return number_format($this->banyak_brg * $this->harga);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
