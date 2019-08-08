<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'phone',
        'email',
        'address',
        'content',
        'created_at',
        'updated_at',
    ];
}
