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

    public function createCharts(){
        return view('admin.charts');
    }

    public function createTables(){
        return view('admin.tables');
    }

    public function totalPostToday(){
        $post = new projectInfoModel;
        $now = Carbon::now()->toDateString();
        $postToday = $post::where('created_at','>=',$now)->where('updated_at','>=',$now)->where('availability','=','Public')->get();
        return $postToday;
    }
    
    public function totalUser(){
        $user = new User;
        return $user::all()->where("name","!=","admin");
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
