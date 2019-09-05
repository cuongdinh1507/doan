<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class postController extends Controller
{
    public function create($id){

    	return view('post',['id'=>$id]);
    }

    public function update($id){
    	$user = DB::table("users")->get();
    	$pd = DB::table("project_description")->where('title_id', $id)->get();
    	$pdd = DB::table("project_data_description")->where('title_id', $id)->get();
    	$pp = DB::table("project_personel")->where('title_id', $id)->get();
    	if (($pd) && ($pdd) && ($pp))
    		return view('postUpdate',['id'=>$id, 'button' => 'Update', 'data'=> $user]);
    	else
    		return view('postUpdate',['id'=>$id, 'button' => 'OK', 'data'=> $pp]);
    }
}
