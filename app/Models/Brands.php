<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discounts;

class Brands extends Model
{
    use HasFactory;

    public function discount()
    {

        return $this->belongsTo(Discount::class,'id', 'discount_id');

    }

}
