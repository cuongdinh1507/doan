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
        return view('topic',['id'=>0]);
    }

    public function createTopicSubject($id){
        return view('topic',['id'=>$id]);
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
        return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")->join("project_description", "project_info.id", "=", "project_description.title_id")->join("subjects","project_info.subject_id","=","subjects.id")->where("availability","=","Public")->orderBy("project_info.id","desc")->get();
    }

    public function searchsk(){
        $pi = new projectInfoModel;
        if (request()->ajax()){
            $subject = request()->get('subject');
            $text = request()->get('text');
            $keyword = request()->get('keyword');
            if ( $subject == null && $keyword == null && $text == null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject != null && $keyword != null && $text != null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("subjects.nameSubject", "=", $subject)
                ->where("project_info.title", "LIKE", "%{$text}%")
                ->where("project_description.keyword", "LIKE", "%{$keyword}%")
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject != null && $keyword == null && $text == null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("subjects.nameSubject", "=", $subject)
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject != null && $keyword != null && $text == null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("subjects.nameSubject", "=", $subject)
                ->where("project_description.keyword", "LIKE", "%{$keyword}%")
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject != null && $keyword == null && $text != null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("subjects.nameSubject", "=", $subject)
                ->where("project_info.title", "LIKE", "%{$text}%")
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject == null && $keyword != null && $text == null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("project_description.keyword", "LIKE", "%{$keyword}%")
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject == null && $keyword != null && $text != null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("project_description.keyword", "LIKE", "%{$keyword}%")
                ->where("project_info.title", "LIKE", "%{$text}%")
                ->orderBy("project_info.id","desc")
                ->get();
            else if ( $subject == null && $keyword == null && $text != null )
                return $pi::select("project_info.title", "project_info.id", "subjects.nameSubject", "project_description.keyword", "project_description.abstract", "project_info.updated_at")
                ->join("project_description", "project_info.id", "=", "project_description.title_id")
                ->join("subjects","project_info.subject_id","=","subjects.id")
                ->where("availability","=","Public")
                ->where("project_info.title", "LIKE", "%{$text}%")
                ->orderBy("project_info.id","desc")
                ->get();
        }
    }
}
