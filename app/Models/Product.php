<?php

namespace App\Models;
use App\Models\Store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function store()
    {
        return $this->belongsTo(Store::class , 'store_id','id' );
    }
}
