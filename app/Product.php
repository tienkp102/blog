<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'image',
        'price',
        'content',
        'created_at',
        'updated_at'
    ];

    public static function showProduct(){
        $product = Product::join('category_product', 'category_product.product_id', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'category_product.category_id')
            ->where('categories.role', '1')
            ->select(
                'products.*',
                'categories.title',
                'category_product.category_id'
            )
            ->get();

        return $product;
    }
}
