<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'id', 'nameRole','descriptionRole',
    ];
    public $timestamps = true;
}
