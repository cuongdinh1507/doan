<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class myResourcesController extends Controller
{
    public function create(){
    	$project_info = DB::table('project_personel')
    	->where('user_id', Auth::user()->id)
    	->orderBy('id','desc')
    	->get();

    	return view('myresources')->with('data',$project_info);
    }
}
