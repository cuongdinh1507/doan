<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\projectPersonnel;
use App\projectDescription;
use App\projectInfoModel;
use DB;

class addNewController extends Controller
{
    public function create(){
    	return view('addNew');
    }

    public function add(){
		$pi = new projectInfoModel;
		$pd = new projectDescription;
		$pp = new projectPersonnel;
    	$pi->user_id = Auth::user()->id;
    	$pi->title = request()->title;
		$pi->role_id = request()->role;
		$pi->subject_id = request()->subject;
		$pi->save();

    	$pp->user_id =Auth::user()->id;
    	$pp->title_id = $pi->id;
    	$pp->role_id = request()->role;
		$pp->save();

        $pd->title_id = $pi->id;
        $pd->save();

    	return redirect()->route("post.create",['id'=>$pi->id]);
    }
}
