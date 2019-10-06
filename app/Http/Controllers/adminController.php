<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\projectInfoModel;
use App\projectDescription;
use App\projectDataDescription;
use App\projectPersonnel;
use App\User;
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

    public function totalPostToday(){
        $post = new projectInfoModel;
        $now = Carbon::now()->toDateString();
        $postToday = $post::where('created_at','>=',$now)->where('updated_at','>=',$now)->where('availability','=','Public')->get();
        return $postToday;
    }
    
    public function totalUser(){
        $user = new User;
        return $user::where("name","!=","admin")->orderBy('id','desc')->get();
    }

    public function totalPost(){
        $post = new projectInfoModel;
        return $post::orderBy("id","desc")->get();
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
}
