<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable =
        [
            'user_id',
        ];
    public function billDetails()
    {
        return $this->hasMany(billDetail::class, 'bill_id');
    }
}
