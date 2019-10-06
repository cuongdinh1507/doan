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
    	$pi->user_id = request()->userid;
    	$pi->title = request()->title;
    	$pi->role = "Owner";
    	$pi->subject = request()->subject;
    	$pi->species = request()->species;
    	$pi->language = request()->lang;
		$pi->availability = request()->availability;
		$pi->save();

    	$pp->user_id = request()->userid;
    	$pp->title_id = $pi->id;
    	$pp->role = "Owner";
		$pp->save();

        $pd->title_id = $pi->id;
        $pd->abstract = request()->abstract;
        $pd->keyword = request()->keyword;
        $pd->funding = request()->funding;
        $pd->yearStart = request()->start;
        $pd->yearEnd = request()->end;
        $pd->publication = request()->publication;
        $pd->save();

    	return redirect()->route('myresources.create')->with('message_add','Post successfully added');
    }
}
