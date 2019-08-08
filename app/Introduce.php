<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    protected $table = 'introduces';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'content',
        'created_at',
        'updated_at'
    ];
}
