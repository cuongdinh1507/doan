<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\projectInfoModel;
use App\projectDescription;
use App\projectDataDescription;
use App\projectPersonnel;
use App\User;
use App\event;
use App\role;
use App\subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class adminController extends Controller
{
    public function createDashboard(){
        return view('admin.dashboard');
    }

    public function createUsers(){
        return view('admin.users');
    }

    public function createProjectInfo(){
        return view('admin.projectInfo');
    }

    public function createProjectDD(){
        return view('admin.projectDD');
    }

    public function createProjectDescription(){
        return view('admin.projectDescription');
    }

    public function createProjectPersonnel(){
        return view('admin.projectPersonnel');
    }

    public function createEvents(){
        return view('admin.events');
    }

    public function createSubjects(){
        return view('admin.subjects');
    }

    public function createRoles(){
        return view('admin.roles');
    }

    public function totalPostToday(){
        $post = new projectInfoModel;
        $now = Carbon::now()->toDateString();
        $postToday = $post::where('created_at','>=',$now)->where('updated_at','>=',$now)->where('availability','=','Public')->get();
        return $postToday;
    }
    
    public function totalUser(){
        $user = new User;
        return $user::where("isAdmin","!=",1)->orderBy('id','desc')->get();
    }

    public function totalPost(){
        $post = new projectInfoModel;
        return $post::select("project_info.id","project_info.title","users.email","project_info.subject","project_info.species","project_info.language","project_info.availability")->join("users", "user_id", "users.id")->orderBy("project_info.id","desc")->get();
    }

    public function totalFileUploaded(){
        $file = new projectDataDescription;
        return $file::select('project_data_description.name', 'typeOfData', 'description', 'typeOfAnalysis', 'when', 'project_data_description.link', 'where', 'typeOfFile', 'users.email', 'project_data_description.user_id', 'project_data_description.id')
        ->join('users', 'user_id', '=', 'users.id')
        ->orderBy('id','desc')
        ->get();
    }

    public function getProjectDescription(){
        $pd = new projectDescription;
        return $pd::join('project_info','title_id','=','project_info.id')->orderBy('project_description.id','desc')->get();
    }

    public function getPP(){
        $pp = new projectPersonnel;
        return $pp::join('users','user_id','=','users.id')->join('project_info','title_id','=','project_info.id')->get();
    }

    public function delUser(){
        $user = new User();
        if ( request()->ajax()){
            if ( Auth::user()->isAdmin == 1){
                $user::find(request()->get('id'))->delete();
                return "ok";
            }
            else
                return back();
        }
    }

    public function delPi(){
        $pi = new projectInfoModel();
        if ( request()->ajax()){
            if ( Auth::user()->isAdmin == 1){
                $pi::where('id','=',request()->get('id'))->delete();
                return "ok";
            }
            else
                return back();
        }
    }

    public function delPp(){
        $pp = new projectPersonnel();
        $pi = new projectInfoModel();
        if ( request()->ajax()){
            if ( Auth::user()->isAdmin == 1){
                $pp::where('user_id','=',request()->get('user_id'))->where('title_id','=',request()->get('title_id'))->delete();
                if ( request()->get('role') == "Owner" )
                    $pi::find(request()->get('title_id'))->delete();
                return "ok";
            }
            else
                return back();
        }
    }

    public function delPd(){
        $pd = new projectDescription();
        if ( request()->ajax()){
            if ( Auth::user()->isAdmin == 1){
                $pd::find(request()->get('id'))->delete();
                return "ok";
            }
            else
                return back();
        }
    }

    public function delPdd(){
        $pdd = new projectDataDescription();
        if ( request()->ajax()){
            if ( Auth::user()->isAdmin == 1){
                $pdd::find(request()->get('id'))->delete();
                return "ok";
            }
            else
                return back();
        }
    }

    public function saveSubject(Request $request){
		$fileName = $request->file('file')->getClientOriginalName();
		$newFileName = md5($fileName.time()).$fileName;
		$path = $request->file('file')->move(storage_path("/app/public"), $newFileName);
		$subject = new subject;
		$subject->nameSubject = request()->name;
        $subject->descriptionSubject = request()->description;
        $subject->imageSubject = asset("storage/".$newFileName);
        $subject->save();
        return back();
    }

    public function getSubject(){
        $subject = new subject;
        return $subject::all();
    }

    public function delSubject(){
        $id = request()->get('id');
        $subject = new subject;
        $subject::where('id','=',$id)->delete();
        return "ok";
    }

    public function updateSubject(Request $request){
        $subject = new subject;
        $id = request()->id;
        if ($request->hasFile('fileEdit')){
            $fileName = $request->file('fileEdit')->getClientOriginalName();
            $newFileName = md5($fileName.time()).$fileName;
            $path = $request->file('fileEdit')->move(storage_path("/app/public"), $newFileName);
            $subject::where('id','=',$id)->update([
                "nameSubject" => request()->name,
                "descriptionSubject" => request()->description,
                "imageSubject" => asset("storage/".$newFileName),
            ]);
        }
        else {
            $subject::where('id','=',$id)->update([
                "nameSubject" => request()->name,
                "descriptionSubject" => request()->description,
            ]);
        }
        return back();
    }

    public function saveRole(Request $request){
        $role = new role;
		$role->nameRole = request()->name;
        $role->descriptionRole = request()->description;
        $role->save();
        return back();
    }

    public function getRole(Request $request){
        $role = new role;
        return role::all();
    }

    public function updateRole(Request $request){
        $role = new role;
        $id = request()->id;
        $role::where('id','=',$id)->update([
            "nameRole" => request()->name,
            "descriptionRole" => request()->description,
        ]);
        return back();
    }

    public function delRole(){
        $id = request()->get('id');
        $role = new role;
        $role::where('id','=',$id)->delete();
        return "ok";
    }
}
