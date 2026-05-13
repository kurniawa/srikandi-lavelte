<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'weight',
        'buy_weight_price',
        'sell_fee_per_gram',
        'total_price',
        'stock',
    ];


}
