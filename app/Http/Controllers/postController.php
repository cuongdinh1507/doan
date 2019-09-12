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
		$currentUser = Auth::user()->id;
    	$dataUser = DB::table('users')
    	->whereNotIn('id', function($query) use ($id){
    		$query->select('user_id')->from('project_personel')->where('title_id', '=', $id);
    	})->get();

    	return $dataUser;
    }

    public function update($id){
		$currentUser = Auth::user()->id;
    	$dataPP = DB::table('project_personel')
	    	->join("users", "user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->where('title_id', $id)
	    	->get();
	    $dataUser = DB::table('users')
	    	->leftJoin("project_personel", "id", "=", "project_personel.user_id")
	    	->where('project_personel.title_id', '!=', $id)
	    	->orWhereNull('project_personel.title_id')
	    	->get();
	    $role = DB::table('users')
	    	->join('project_personel', 'id', '=', 'project_personel.user_id')
	    	->where('role','Project leader')
	    	->where('id',$currentUser)
	    	->where('project_personel.title_id', $id)
	    	->get();
	    $check = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
	    	->get();
	    $info = DB::table('project_info')
	    	->join('project_description', 'project_info.id', '=', 'project_description.title_id')
	    	->where('project_info.id',$id)
	    	->get();
	    if ( count($check) != 0 )
			return view('postUpdate',['id'=>$id,'data'=> $dataUser, 'datapp' => $dataPP, 'role' => $role, 'datainfo' => $info]);
		else
			return redirect()->route('myresources.create');
    	// $user = DB::table("users")->get();
    	// $pd = DB::table("project_description")->where('title_id', $id)->get();
    	// $pdd = DB::table("project_data_description")->where('title_id', $id)->get();
    	// $pp = DB::table("project_personel")->where('title_id', $id)->get();
    	// if (($pd) && ($pdd) && ($pp))
    	// else
    	// 	return view('postUpdate',['id'=>$id, 'button' => 'OK', 'data'=> $pp]);
    }

    public function save($id){
    	if (request()->ajax()){
    		$userid = request()->get('userid');
    		$role = request()->get('role');
    		$currentUser = Auth::user()->id;

    		$check = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
	    	->where('role','Project leader')
	    	->get();

	    	if (count($check) != 0){
	    		DB::table('project_personel')->insert([
		    		'user_id' => request()->userid,
		    		'title_id'=> $id,
		    		'role' => request()->role,
		    	]);

		    	$data = DB::table('project_personel')
		    	->join("users", "project_personel.user_id", "=", "users.id")
		    	->where('user_id', '!=', $currentUser)
		    	->where('title_id', $id)
		    	->get();

		    	$dataUser = DB::table('users')
		    	->join("project_personel", "id", "=", "project_personel.user_id")
		    	->where('id', '!=', $currentUser)
		    	->where('project_personel.title_id', '!=', $id)
		    	->get();

	    		return $data;
	    	}
	    	else
	    		return redirect()->route('post.update',['id'=>$id]);
    	}
    	else
    		return redirect()->route('post.update',['id'=>$id]);
    }

    public function deleteUser($id){
    	if (request()->ajax()){
    		$userid = request()->get('userid');
    		$currentUser = Auth::user()->id;
    		$check = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
	    	->where('role','Project leader')
	    	->get();
	    	if (count($check) != 0){
	    		DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->delete();

	    		$data = DB::table('project_personel')
		    	->join("users", "project_personel.user_id", "=", "users.id")
		    	->where('user_id', '!=', $currentUser)
		    	->where('title_id', $id)
		    	->get();
	    		
	    		return $data;
	    	}
	    	else
	    		return redirect()->route('post.update',['id'=>$id]);
    	}
    	else
    		return redirect()->route('post.update',['id'=>$id]);
    }

    public function updateUser($id){
    	if (request()->ajax()){
    		$currentUser = Auth::user()->id;
    		$userid = request()->get('userid');
    		$role = request()->get('role');
    		$check = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
	    	->where('role','Project leader')
	    	->get();

	    	if ( count($check) != 0 ){

	    		DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->update(['role'=>$role]);

	    		$data = DB::table('project_personel')
		    	->join("users", "project_personel.user_id", "=", "users.id")
		    	->where('user_id', '!=', $currentUser)
		    	->where('title_id',$id)
		    	->get();

				return $data;
	    	}
    	}
    	else
    		return redirect()->route('post.update',['id'=>$id]);
    }

    public function updateProjectinfo(){
    	$id = request()->titleid;
		$currentUser = Auth::user()->id;
		$check = DB::table('project_personel')
    	->where('title_id',$id)
    	->where('user_id',$currentUser)
    	->where('role','Project leader')
    	->get();
    	if ( count($check) != 0 ){

    		DB::table('project_info')
    		->where('id','=', $id)
    		->where('user_id','=', $currentUser)
    		->update(['title'=> request()->title, 'subject' => request()->subject, 'species' => request()->species, 'language' => request()->lang, 'availability' => request()->availability ]);

    		DB::table('project_description')
    		->where('title_id','=', $id)
    		->update(['abstract'=> request()->abstract, 'keyword' => request()->keyword, 'funding' => request()->funding, 'yearStart' => request()->start, 'yearEnd' => request()->end, 'publication' => request()->publication ]);

    		$data = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();

			return redirect()->route('post.update',['id'=>$id])->with('ProjectMessage', 'Updated Successfully');
    	}
    }
}
