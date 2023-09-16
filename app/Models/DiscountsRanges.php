<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Discounts;

class DiscountsRanges extends Model
{
    use HasFactory;

    protected $fillable = ['from_days', 'to_days','discount','code','discount_id'];

    public function discounts()
    {

        return $this->belongsTo(Discounts::class,'discount_id', 'id');

    }
}
