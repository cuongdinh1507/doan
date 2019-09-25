<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectInfoModel extends Model
{
    protected $table = 'project_info';
    protected $fillable = [
        'id', 'user_id', 'title', 'role', 'subject', 'language', 'availability',
    ];
    public $timestamps = true;
}
