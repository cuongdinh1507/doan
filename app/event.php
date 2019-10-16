<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'id', 'titleEvent', 'timeEvent', 'addressEvent', 'descriptionEvent',
    ];
    public $timestamps = true;
}
