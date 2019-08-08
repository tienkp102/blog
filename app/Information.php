<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'content',
        'type_input',
        'created_at',
        'updated_at'
    ];
}
