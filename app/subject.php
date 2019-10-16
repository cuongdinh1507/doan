<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'id', 'nameSubject', 'imageSubject', 'descriptionSubject',
    ];
    public $timestamps = true;
}
