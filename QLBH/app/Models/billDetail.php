<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billDetail extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'bill_id',
            'product_id',
            'variant_id',
            'quantity',
            'status'
        ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variant()
    {
        return $this->belongsTo(product_variants::class, 'variant_id');
    }
}
