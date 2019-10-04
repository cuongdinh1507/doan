<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\projectPersonnel;
use App\projectDescription;
use App\projectInfoModel;
use App\projectDataDescription;
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
				$pp = new projectPersonnel;
	    		$pp::where('title_id','=', $id)->where('user_id','=', $userid)->update(['role'=>$role]);

	    		$data = $pp::join("users", "project_personel.user_id", "=", "users.id")
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

			return redirect()->route('post.update',['id'=>$id])->with('ProjectMessage', 'Updated Successfully');
    	}
    }

    public function createDD($id){
    	$currentUser = Auth::user()->id;
    	$role = DB::table('project_personel')
    	->where('user_id',$currentUser)
    	->where('title_id', $id)
    	->where('role', 'Project leader')
    	->get();
    	return view('uploadFile', ['id'=>$id, 'role'=>$role]);
	}

	public function newUpload(Request $request){
		$currentUser = Auth::user()->id;
		$fileName = $request->file('file')->getClientOriginalName();
		$newFileName = md5($fileName.time()).$fileName;
		$path = $request->file('file')->move(storage_path("/app/upload"), $newFileName);
		// $rules = [
		// 	'file' => 'required|max:'.config('app.maxFileSize')
		// ];
		// $this->validate($request,$rules);
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
		return back()->with('uploaded','File has been successfully uploaded');
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
			return "ok";
		}
	}

	public function updateFile(Request $request){
		$pdd = new projectDataDescription;
		$currentUser = Auth::user()->id;
		if ( $request->hasFile('fileEdit')){
			$fileName = $request->file('fileEdit')->getClientOriginalName();
			$newFileName = md5($fileName.time()).$fileName;
			$path = $request->file('fileEdit')->move(storage_path("/app/upload"), $newFileName);
			$pdd::where('id', request()->fileid)
			->update([
				'name' => request()->nameEdit,
				'typeOfData' => request()->todEdit,
				'description' => request()->descriptionEdit,
				'typeOfAnalysis' => request()->toaEdit,
				'when' => request()->whenEdit,
				'where' => request()->whereEdit,
				'title_id' => request()->titleid,
				'user_id' => $currentUser,
				'link' => $newFileName,
				'typeOfFile' => request()->tofEdit,
			]);
			return back()->with('updated file','File has been successfully updated');
		}
		else {
			$pdd::where('id', '=', request()->fileid)
			->update([
				'name' => request()->nameEdit,
				'typeOfData' => request()->todEdit,
				'description' => request()->descriptionEdit,
				'typeOfAnalysis' => request()->toaEdit,
				'when' => request()->whenEdit,
				'where' => request()->whereEdit,
				'title_id' => request()->titleid,
				'user_id' => $currentUser,
			]);
			return back()->with('updated file','File has been successfully updated');
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
