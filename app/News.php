<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'description',
        'content',
        'slug',
        'category_id',
        'created_at',
        'updated_at'
    ];
}
