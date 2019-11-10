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
		$pi = new projectInfoModel;
		$pd = new projectDescription;
		$pdd = new projectDataDescription;
		$pp = new projectPersonnel;
		$private = $pi::where("id","=",$id)->where("availability","=","Private")->get();
		$postInfo = $pi::select("project_info.availability", "project_info.created_at", "roles.descriptionRole", "subjects.descriptionSubject", "project_info.id", "project_info.language", "roles.nameRole", "subjects.nameSubject", "project_info.role_id", "project_info.species", "project_info.subject_id","project_info.title", "project_info.updated_at")
		->join('roles', 'role_id', '=', 'roles.id')->join('subjects', 'subject_id', '=', 'subjects.id')->where('project_info.id','=',$id)->get();
		$postDescription = $pd::where('title_id', '=', $id)->get();
		$author = $pp::join('users', 'user_id','=','users.id')->where('title_id', '=', $id)->get();
		$fileData = $pdd::where('title_id', '=', $id)->get();
		if (count($private) != 0){
			if (Auth::check()){
				$currentUser = Auth::user()->id;
				$checkAuthor = $pp::where('title_id', '=', $id)->where('user_id', '=', $currentUser)->get();
				if (count($checkAuthor) != 0){
					$role = $pi::where('project_info.user_id', '=', $currentUser)
					->where('project_info.id', '=', $id)
					->get();
					$dataPP = DB::table('project_personel')
						->join("users", "user_id", "=", "users.id")
						->join('roles', 'role_id', '=', 'roles.id')
						->where('user_id', '!=', $currentUser)
						->where('title_id', $id)
						->get();
					return view('post',['id'=>$id, 'checkAuthor'=> $checkAuthor, 'postInfo'=> $postInfo, 'postDescription'=> $postDescription, 'author'=> $author, 'fileData'=> $fileData, 'role'=>$role, 'dataPP' => $dataPP]);
				}
				else {
					return redirect()->back();
				}
			}
			else
				return redirect()->back();
		}
		else {
			$checkAuthor = 0;
			$role = 0;
			$dataPP = 0;
			if (Auth::check()){
				$currentUser = Auth::user()->id;
				$checkAuthor = $pp::where('title_id', '=', $id)->where('user_id', '=', $currentUser)->get();
				if (count($checkAuthor) != 0){
					$role = $pi::where('project_info.user_id', '=', $currentUser)
					->where('project_info.id', '=', $id)
					->get();
					$dataPP = DB::table('project_personel')
						->join("users", "user_id", "=", "users.id")
						->join('roles', 'role_id', '=', 'roles.id')
						->where('user_id', '!=', $currentUser)
						->where('title_id', $id)
						->get();
					return view('post',['id'=>$id, 'checkAuthor'=> $checkAuthor, 'postInfo'=> $postInfo, 'postDescription'=> $postDescription, 'author'=> $author, 'fileData'=> $fileData, 'role'=>$role, 'dataPP' => $dataPP]);
				}
				else {
					return view('post',['id'=>$id, 'checkAuthor'=> $checkAuthor, 'postInfo'=> $postInfo, 'postDescription'=> $postDescription, 'author'=> $author, 'fileData'=> $fileData, 'role'=>$role, 'dataPP' => $dataPP]);
				}
			}
			else
				return view('post',['id'=>$id, 'checkAuthor'=> $checkAuthor, 'postInfo'=> $postInfo, 'postDescription'=> $postDescription, 'author'=> $author, 'fileData'=> $fileData, 'role'=>$role, 'dataPP' => $dataPP]);
		}
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
		// $currentUser = Auth::user()->id;
    	// $dataPP = DB::table('project_personel')
	    // 	->join("users", "user_id", "=", "users.id")
	    // 	->where('user_id', '!=', $currentUser)
	    // 	->where('title_id', $id)
	    // 	->get();
	    // $dataUser = DB::table('users')
	    // 	->leftJoin("project_personel", "id", "=", "project_personel.user_id")
	    // 	->where('project_personel.title_id', '!=', $id)
	    // 	->orWhereNull('project_personel.title_id')
	    // 	->get();
	    // $role = DB::table('users')
		// 	->join('project_personel', 'users.id', '=', 'project_personel.user_id')
		// 	->join('roles', 'project_personel.role_id', '=', 'roles.id')
	    // 	->where('users.id',$currentUser)
	    // 	->where('project_personel.title_id', $id)
		// 	->where('roles.nameRole','Project leader')
		// 	->orWhere('roles.nameRole','Owner')
		// 	->where('users.id',$currentUser)
	    // 	->where('project_personel.title_id', $id)
	    // 	->get();
	    // $check = DB::table('project_personel')
	    // 	->where('title_id',$id)
	    // 	->where('user_id',$currentUser)
	    // 	->get();
	    // $info = DB::table('project_info')
	    // 	->join('project_description', 'project_info.id', '=', 'project_description.title_id')
	    // 	->where('project_info.id',$id)
	    // 	->get();
	    // if ( count($check) != 0 )
		// 	return view('postUpdate',['id'=>$id,'data'=> $dataUser, 'datapp' => $dataPP, 'role' => $role, 'datainfo' => $info]);
		// else
		// 	return redirect()->route('myresources.create');
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
			$pi = new projectInfoModel;
			$check = $pi::where("id","=",$id)->where("user_id","=", $currentUser)->get();

	    	if (count($check) != 0){
				$newpp = new projectPersonnel;
				$newpp->user_id = request()->userid;
				$newpp->title_id = $id;
				$newpp->role_id = request()->role;
				$newpp->save();

		    	$data = DB::table('project_personel')
				->join("users", "project_personel.user_id", "=", "users.id")
				->join("roles", 'role_id', '=', 'roles.id')
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
			$pi = new projectInfoModel;
			$check = $pi::where("id","=", $id)->where("user_id","=", $currentUser)->get();
			// $check_pl = DB::table('project_personel')
			// ->join('roles', 'role_id', '=', 'roles.id')
	    	// ->where('title_id',$id)
	    	// ->where('user_id',$currentUser)
			// ->where('roles.nameRole','Project leader')
			// ->get();
			// $check_owner = DB::table('project_personel')
			// ->join('roles', 'role_id', '=', 'roles.id')
	    	// ->where('title_id',$id)
	    	// ->where('user_id',$currentUser)
			// ->where('roles.nameRole','Owner')
			// ->get();
	    	// if ((count($check_pl) != 0) || (count($check_owner) != 0)){
			if (count($check) != 0 ){
				DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->delete();

				$data = DB::table('project_personel')
				->join("users", "project_personel.user_id", "=", "users.id")
				->join("roles", 'role_id', '=', 'roles.id')
				->where('user_id', '!=', $currentUser)
				->where('title_id', $id)
				->get();
				
				return $data;
			}
				
				// else {
				// 	$if_delete_owner = DB::table('project_personel')->join('roles','role_id','=','roles.id')->where('title_id','=', $id)->where('user_id','=', $userid)->where('roles.nameRole','=','Owner')->get();
				// 	if ( count($if_delete_owner) != 0 )
				// 		return redirect()->route('post.update',['id'=>$id]);
				// 	else {
				// 		DB::table('project_personel')->where('title_id','=', $id)->where('user_id','=', $userid)->delete();

				// 		$data = DB::table('project_personel')
				// 		->join("users", "project_personel.user_id", "=", "users.id")
				// 		->join("roles", 'role_id', '=', 'roles.id')
				// 		->where('user_id', '!=', $currentUser)
				// 		->where('title_id', $id)
				// 		->get();
						
				// 		return $data;
				// 	}
				// }
	    	else
				return redirect()->back();
    	}
    	else
			return redirect()->back();
    }

    public function updateUser($id){
    	if (request()->ajax()){
    		$userid = request()->get('userid');
			$currentUser = Auth::user()->id;
			$pi = new projectInfoModel;
			$check = $pi::where("id","=", $id)->where("user_id","=", $currentUser)->get();
			$role = request()->get('role');
	    	if (count($check) != 0 ){
				$pp = new projectPersonnel;
				$pp::where('title_id','=', $id)->where('user_id','=', $userid)->update(['role_id'=>$role]);

				$data = $pp::join("users", "project_personel.user_id", "=", "users.id")
				->join("roles", "project_personel.role_id", "=", "roles.id")
				->where('user_id', '!=', $currentUser)
				->where('title_id',$id)
				->get();

				return $data;
			}
			else
				return redirect()->back();
    	}
    	else
			return redirect()->back();
    }

    public function updateProjectinfo(){
    	$id = request()->titleid;
		$currentUser = Auth::user()->id;
		$pi = new projectInfoModel;
		$check = $pi::where("id","=",$id)->where("user_id", "=", $currentUser)->get();
    	if ( count($check) != 0 ){
			$pd = new projectDescription;
    		$pi::where('id','=', $id)
    		->update(['title'=> request()->title, 'subject_id' => request()->subject, 'species' => request()->species, 'language' => request()->lang, 'availability' => request()->availability ]);

    		$pd::where('title_id','=', $id)
    		->update(['abstract'=> request()->abstract, 'keyword' => request()->keyword, 'funding' => request()->funding, 'startDate' => request()->start, 'endDate' => request()->end, 'publication' => request()->publication, 'lat' => request()->lat, 'lng' => request()->lng ]);

    		$data = DB::table('project_personel')
	    	->join("users", "project_personel.user_id", "=", "users.id")
	    	->where('user_id', '!=', $currentUser)
	    	->get();

			return redirect()->back()->with('updateSuccess','Updated Successfully!');
		}
		return redirect()->back()->with('updateFail','Your role cannot use this ability!');
    }

    public function createDD($id){
    	$currentUser = Auth::user()->id;
		$role = DB::table('project_personel')
		->join('roles', 'role_id', '=', 'roles.id')
    	->where('user_id',$currentUser)
    	->where('title_id', $id)
		->where('roles.nameRole', 'Project leader')
		->orWhere('roles.nameRole','Owner')
		->where('user_id',$currentUser)
    	->where('title_id', $id)
    	->get();
    	return view('uploadFile', ['id'=>$id, 'role'=>$role]);
	}

	public function newUpload(Request $request){
		$currentUser = Auth::user()->id;
		$validator = Validator::make($request->all(), [
				'fileUp' => 'required|file|max:2048',
			]
		);
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
		return $pdd::where("title_id",'=',request()->titleid)->get();
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
		$pi = new projectInfoModel;
		$titleid = request()->get('titleid');
		$check = $pi::join("project_data_description", "project_info.id", "=", "project_data_description.title_id")->where("project_info.id","=", $titleid)->where("project_info.user_id","=", $currentUser)->get();
		if (request()->ajax()){
			$idfile = request()->get('idfile');
			if ( count($check) == 0) {
				DB::table('project_data_description')
				->where('id',$idfile)
				->where('user_id', $currentUser)
				->delete();
				unlink(storage_path('app/upload/'.request()->get('link')));
			}
			else {
				DB::table('project_data_description')
				->where('id',$idfile)
				->delete();
				unlink(storage_path('app/upload/'.request()->get('link')));
			}
			$pdd = new projectDataDescription;
			return $pdd::where('title_id','=',$id)->get();
		}
	}

	public function updateFile(){
		$pdd = new projectDataDescription;
		$pp = new projectPersonnel;
		$titleid = request()->get('titleid');
		$currentUser = Auth::user()->id;
		$pi = new projectInfoModel;
		$check = $pi::join("project_data_description", "project_info.id", "=", "project_data_description.title_id")->where("project_info.id","=", $titleid)->where("project_info.user_id","=", $currentUser)->get();
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
			return $pdd::where('title_id','=',$titleid)->get();
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
			return $pdd::where('title_id','=',$titleid)->get();
		}
	}

	public function delPost(){
		if (request()->ajax()){
			$id = request()->get('id');
			$pi = new projectInfoModel;
			$check = $pi::where("user_id", "=", Auth::user()->id)->get();
			if (count($check) != 0){
				$pi::find($id)->delete();
				return "ok";
			}
			else {
				return "no";
			}
		}
	}
}
