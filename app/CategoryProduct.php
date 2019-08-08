<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'category_id',
        'product_id',
        'created_at',
        'updated_at'
    ];
}
