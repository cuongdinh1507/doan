<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\projectInfoModel;
use App\projectDescription;
use App\projectDataDescription;
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
        return $user::where("name","!=","admin")->get();
    }

    public function totalPost(){
        $post = new projectInfoModel;
        return $post::all();
    }

    public function totalFileUploaded(){
        $file = new projectDataDescription;
        return $file::all();
    }
}
