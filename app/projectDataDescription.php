<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectDataDescription extends Model
{
    protected $table = 'project_data_description';
    protected $fillable = [
        'id', 'name', 'typeOfData', 'description', 'typeOfAnalysis', 'when', 'link', 'where', 'typeOfFile', 'title_id', 'user_id',
    ];
    public $timestamps = true;
}
