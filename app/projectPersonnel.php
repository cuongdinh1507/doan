<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectPersonnel extends Model
{
    protected $table = 'project_personel';
    protected $fillable = [
        'user_id', 'title_id', 'role',
    ];
    public $timestamps = true;
}
