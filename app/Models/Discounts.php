<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\DiscountsRanges;
use App\Models\Brands;
use App\Models\Regions;
use App\Models\AccessTypes;

class Discounts extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'start_date','end_date','priority','active','region_id','brand_id','access_type_code'];

    public function discountsRanges()
    {
        return $this->hasMany(DiscountsRanges::class,'discount_id');

    }

    public function brands()
    {

        return $this->belongsTo(Brands::class,'brand_id', 'id');

    }

    public function regions()
    {

        return $this->belongsTo(Regions::class,'region_id', 'id');

    }

    public function accessTypes()
    {

        return $this->belongsTo(AccessTypes::class,'access_type_code', 'code');

    }
}
