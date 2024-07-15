<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarModel extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name','brand_id','manufacturing_year'
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
