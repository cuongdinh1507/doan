<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class newsController extends Controller
{
    public function create(){

    	$data = DB::table('project_info')
    	->join('users', 'user_id', '=', 'users.id')
    	->where('availability','Public')
    	->orderBy('project_info.id','desc')
    	->get();

    	return view('news',['data'=>$data]);
    }
}
