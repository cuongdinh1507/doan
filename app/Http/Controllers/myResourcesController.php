<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class myResourcesController extends Controller
{
    public function create(){
		$project_info = DB::table('project_info')
		->select('project_info.id','roles.nameRole','species','subjects.nameSubject','language','title')
		->join('project_personel', 'id', '=', 'project_personel.title_id')
		->join("roles", 'project_info.role_id', '=', 'roles.id')
		->join("subjects", 'project_info.subject_id', '=', 'subjects.id')
    	->where('project_personel.user_id', Auth::user()->id)
    	->orderBy('project_personel.title_id','desc')
    	->get();

    	return view('myresources')->with('data',$project_info);
    }
}
