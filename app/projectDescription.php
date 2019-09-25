<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectDescription extends Model
{
    protected $table = 'project_description';
    protected $fillable = [
        'id', 'title_id', 'abstract', 'keyword', 'funding', 'yearStart', 'yearEnd', 'publication',
    ];
    public $timestamps = true;
}
