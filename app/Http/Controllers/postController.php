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

    public function getAll($id){
    	$dataUser = DB::table('users')
    	->leftJoin("project_personel", "id", "=", "project_personel.user_id")
    	->where('project_personel.title_id', '!=', $id)
    	->orWhereNull('project_personel.title_id')
    	->get();
    	return $dataUser;
    }

    public function update($id){
		$currentUser = Auth::user()->id;
    	$dataPP = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();
	    $dataUser = DB::table('users')
	    	->leftJoin("project_personel", "id", "=", "project_personel.user_id")
	    	->where('project_personel.title_id', '!=', $id)
	    	->orWhereNull('project_personel.title_id')
	    	->get();
    	$user = DB::table("users")->get();
    	$pd = DB::table("project_description")->where('title_id', $id)->get();
    	$pdd = DB::table("project_data_description")->where('title_id', $id)->get();
    	$pp = DB::table("project_personel")->where('title_id', $id)->get();
    	if (($pd) && ($pdd) && ($pp))
    		return view('postUpdate',['id'=>$id, 'button' => 'Update', 'data'=> $dataUser, 'datapp' => $dataPP]);
    	else
    		return view('postUpdate',['id'=>$id, 'button' => 'OK', 'data'=> $pp]);
    }

    public function save($id){
    	if (request()->ajax()){
    		$userid = request()->get('userid');
    		$role = request()->get('role');
    		$currentUser = Auth::user()->id;

    		// DB::table("project_personel")->where()

    		DB::table('project_personel')->insert([
	    		'user_id' => request()->userid,
	    		'title_id'=> $id,
	    		'role' => request()->role,
	    	]);

	    	$data = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();

	    	$dataUser = DB::table('users')
	    	->join("project_personel", "id", "=", "project_personel.user_id")
	    	->where('id', '!=', $currentUser)
	    	->where('project_personel.title_id', '!=', $id)
	    	->get();

    		return $data;
    	}
    }

    public function deleteUser($id){
    	if (request()->ajax()){
    		$userid = request()->get('userid');
    		$currentUser = Auth::user()->id;
    		DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->delete();

    		$data = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();
    		
    		return $data;
    	}
    }

    public function updateUser($id){
    	if (request()->ajax()){
    		$currentUser = Auth::user()->id;
    		$userid = request()->get('userid');
    		$role = request()->get('role');
    		DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->update(['role'=>$role]);

    		$data = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();

			return $data;
    	}
    }
}
