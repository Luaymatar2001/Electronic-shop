<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product; 

class Store extends Model
{
    use SoftDeletes;
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class , 'store_id','id' );

    }
}
