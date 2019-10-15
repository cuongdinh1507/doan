<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\projectPersonnel;
use App\projectDescription;
use App\projectInfoModel;
use App\projectDataDescription;
use Illuminate\Support\Facades\Validator;
use DB;

class postController extends Controller
{
    public function create($id){
		$currentUser = Auth::user()->id;
		$pi = new projectInfoModel;
		$pd = new projectDescription;
		$pdd = new projectDataDescription;
		$pp = new projectPersonnel;
		$checkAuthor = $pp::where('title_id', '=', $id)->where('user_id', '=', $currentUser)->get();
		$postInfo = $pi::where('id','=',$id)->get();
		$postDescription = $pd::where('title_id', '=', $id)->get();
		$author = $pp::join('users', 'user_id','=','users.id')->where('title_id', '=', $id)->get();
		$fileData = $pdd::where('title_id', '=', $id)->get();
		$role = DB::table('users')
	    	->join('project_personel', 'id', '=', 'project_personel.user_id')
	    	->where('id',$currentUser)
	    	->where('project_personel.title_id', $id)
			->where('role','Project leader')
			->orWhere('role','Owner')
			->where('id',$currentUser)
	    	->where('project_personel.title_id', $id)
			->get();
		$dataPP = DB::table('project_personel')
			->join("users", "user_id", "=", "users.id")
			->where('user_id', '!=', $currentUser)
			->where('title_id', $id)
			->get();
    	return view('post',['id'=>$id, 'checkAuthor'=> $checkAuthor, 'postInfo'=> $postInfo, 'postDescription'=> $postDescription, 'author'=> $author, 'fileData'=> $fileData, 'role'=>$role, 'dataPP' => $dataPP]);
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
	    	->where('id',$currentUser)
	    	->where('project_personel.title_id', $id)
			->where('role','Project leader')
			->orWhere('role','Owner')
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
			->orWhere('role','Owner')
			->where('title_id',$id)
	    	->where('user_id',$currentUser)
	    	->get();

	    	if (count($check) != 0){
				$newpp = new projectPersonnel;
				$newpp->user_id = request()->userid;
				$newpp->title_id = $id;
				$newpp->role = request()->role;
				$newpp->save();

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
    		$check_pl = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
			->where('role','Project leader')
			->get();
			$check_owner = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
			->where('role','Owner')
			->get();
	    	if ((count($check_pl) != 0) || (count($check_owner) != 0)){
				if (count($check_owner) != 0 ){
					DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->delete();

					$data = DB::table('project_personel')
					->join("users", "project_personel.user_id", "=", "users.id")
					->where('user_id', '!=', $currentUser)
					->where('title_id', $id)
					->get();
					
					return $data;
				}
				
				else {
					$if_delete_owner = DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->where('role','=','Owner')->get();
					if ( count($if_delete_owner) != 0 )
						return redirect()->route('post.update',['id'=>$id]);
					else {
						DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->delete();

						$data = DB::table('project_personel')
						->join("users", "project_personel.user_id", "=", "users.id")
						->where('user_id', '!=', $currentUser)
						->where('title_id', $id)
						->get();
						
						return $data;
					}
				}
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
    		$check_pl = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
			->where('role','Project leader')
			->get();
			$check_owner = DB::table('project_personel')
	    	->where('title_id',$id)
	    	->where('user_id',$currentUser)
			->where('role','Owner')
			->get();

	    	if ( (count($check_pl) != 0) || ( count($check_owner) != 0 ) ){
				$pp = new projectPersonnel;
				if ( count($check_owner) != 0 ){
					$pp::where('title_id','=', $id)->where('user_id','=', $userid)->update(['role'=>$role]);

					$data = $pp::join("users", "project_personel.user_id", "=", "users.id")
					->where('user_id', '!=', $currentUser)
					->where('title_id',$id)
					->get();

					return $data;
				}
				if (count($check_pl) != 0){
					$if_owner = $pp::where('title_id','=', $id)->where('user_id','=', $userid)->where('role','=','Owner')->get();
					if ( count($if_owner) != 0 )
						return redirect()->route('post.update',['id'=>$id]);
					else {
						$pp::where('title_id','=', $id)->where('user_id','=', $userid)->update(['role'=>$role]);

						$data = $pp::join("users", "project_personel.user_id", "=", "users.id")
						->where('user_id', '!=', $currentUser)
						->where('title_id',$id)
						->get();

						return $data;
					}
				}
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
		->orWhere('role','Owner')
		->where('title_id',$id)
    	->where('user_id',$currentUser)
    	->get();
    	if ( count($check) != 0 ){
			$pi = new projectInfoModel;
			$pd = new projectDescription;
    		$pi::where('id','=', $id)
    		->where('user_id','=', $currentUser)
    		->update(['title'=> request()->title, 'subject' => request()->subject, 'species' => request()->species, 'language' => request()->lang, 'availability' => request()->availability ]);

    		$pd::where('title_id','=', $id)
    		->update(['abstract'=> request()->abstract, 'keyword' => request()->keyword, 'funding' => request()->funding, 'yearStart' => request()->start, 'yearEnd' => request()->end, 'publication' => request()->publication ]);

    		$data = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();

			return redirect()->back();
		}
		return "k hie";
    }

    public function createDD($id){
    	$currentUser = Auth::user()->id;
    	$role = DB::table('project_personel')
    	->where('user_id',$currentUser)
    	->where('title_id', $id)
		->where('role', 'Project leader')
		->orWhere('role','Owner')
		->where('user_id',$currentUser)
    	->where('title_id', $id)
    	->get();
    	return view('uploadFile', ['id'=>$id, 'role'=>$role]);
	}

	public function newUpload(Request $request){
		$currentUser = Auth::user()->id;
		// $validator = Validator::make($request->all(), [
		// 		'fileUp' => 'required|file|max:2048',
		// 	]
		// );
		$fileName = $request->file('fileUp')->getClientOriginalName();
		$newFileName = md5($fileName.time()).$fileName;
		$path = $request->file('fileUp')->move(storage_path("/app/upload"), $newFileName);
		$pdd = new projectDataDescription;
		$pdd->name = request()->name;
		$pdd->typeOfData = request()->tod;
		$pdd->description = request()->description;
		$pdd->typeOfAnalysis = request()->toa;
		$pdd->when = request()->when;
		$pdd->where = request()->where;
		$pdd->title_id = request()->titleid;
		$pdd->user_id = $currentUser;
		$pdd->link = $newFileName;
		$pdd->typeOfFile = request()->tof;
		$pdd->save();
		return $pdd::all();
	}

	public function getAllFile($id){
		$currentUser = Auth::user()->id;
		$check = DB::table('project_personel')->where('user_id',$currentUser)->where('title_id', $id)->get();
		if (count($check)!=0){
			$data = DB::table('project_data_description')
			->select('project_data_description.name', 'typeOfData', 'description', 'typeOfAnalysis', 'when', 'project_data_description.link', 'where', 'typeOfFile', 'users.email', 'project_data_description.user_id', 'project_data_description.id')
			->join('users', 'user_id', '=', 'users.id')
			->where('title_id', $id)
			->orderBy('project_data_description.id','desc')
			->get();

			return $data;
		}
		return back();
	}

	public function getDownloadFile($id){
		$data = DB::table('project_data_description')
			->select('link')
			->where('id', $id)
			->get();
		$downloadlink = storage_path()."/app/upload/".$data->first()->link;
		return response()->download($downloadlink);
	}

	public function delFile($id){
		$currentUser = Auth::user()->id;
		if (request()->ajax()){
			$idfile = request()->get('idfile');
			DB::table('project_data_description')
			->where('id',$idfile)
			->where('user_id', $currentUser)
			->delete();
			unlink(storage_path('app/upload/'.request()->get('link')));
			$pdd = new projectDataDescription;
			return $pdd::all();
		}
	}

	public function updateFile(){
		$pdd = new projectDataDescription;
		$pp = new projectPersonnel;
		$titleid = request()->get('titleid');
		$currentUser = Auth::user()->id;
		$check = $pp::where('title_id', '=', $titleid)
		->where('user_id','=', $currentUser)
		->where('role', '=', 'Owner')
		->orWhere('role', '=', 'Project leader')
		->where('title_id', '=', $titleid)
		->where('user_id','=', $currentUser)
		->get();
		if ( count($check) != 0 ){
			$pdd::where('id', '=', request()->get("fileid"))
			->update([
				'name' => request()->get("nameEdit"),
				'typeOfData' => request()->get("todEdit"),
				'description' => request()->get("descriptionEdit"),
				'typeOfAnalysis' => request()->get("toaEdit"),
				'when' => request()->get("whenEdit"),
				'where' => request()->get("whereEdit"),
			]);
			return $pdd::all();
		}
		else{
			$pdd::where('id', '=', request()->get("fileid"))
			->where('user_id','=',$currentUser)
			->update([
				'name' => request()->get("nameEdit"),
				'typeOfData' => request()->get("todEdit"),
				'description' => request()->get("descriptionEdit"),
				'typeOfAnalysis' => request()->get("toaEdit"),
				'when' => request()->get("whenEdit"),
				'where' => request()->get("whereEdit"),
			]);
			return $pdd::all();
		}
	}

	public function delPost(){
		if (request()->ajax()){
			$id = request()->get('id');
			$pi = new projectInfoModel;
			$pi::find($id)->delete();
			return "ok";
		}
	}
}
