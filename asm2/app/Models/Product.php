<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','quantity','image','describe','category_id','status'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
