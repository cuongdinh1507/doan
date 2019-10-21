<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subject;
use App\projectInfoModel;
use App\projectDescription;
use DB;

class topicController extends Controller
{
    public function createTopic(){
        return view('topic');
    }

    public function getSubject(){
        $pi = new projectInfoModel;
        return $pi::select(DB::raw("project_info.subject_id","subjects.nameSubject","count('project_info.subject_id') as num"))
        ->rightJoin("subjects","subject_id","=","subjects.id")->where("availability","=","Public")
        ->groupBy("project_info.subject_id")->get();
    }

    public function getKeyword(){
        $pd = new projectDescription;
        return $pd::select("keyword")->join("project_info", "title_id", "=", "project_info.id")->where("project_info.availability","=","Public")->get();
    }

    public function getPost(){
        $pi = new projectInfoModel;
        return $pi::join("project_description", "project_info.id", "=", "project_description.title_id")->join("subjects","project_info.subject_id","=","subjects.id")->where("availability","=","Public")->get();
    }
}
