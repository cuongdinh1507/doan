<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class addNewController extends Controller
{
    public function create(){
    	return view('addNew');
    }

    public function add(){
    	$id = DB::table('project_info')->insertGetId([
    		'user_id' => request()->userid,
    		'title'=> request()->title,
    		'role' => request()->role,
    		'subject' => request()->subject,
    		'species' => request()->species,
    		'language' => request()->lang,
            'availability' => request()->availability,
    	]);

    	DB::table('project_personel')->insert([
    		'user_id' => request()->userid,
    		'title_id'=> $id,
    		'role' => request()->role,
    	]);

        DB::table('project_description')->insert([
            'title_id' => $id,
            'abstract' => request()->abstract,
            'keyword' => request()->keyword,
            'funding' => request()->funding,
            'yearStart' => request()->start,
            'yearEnd' => request()->end,
            'publication' => request()->publication,
        ]);

    	return redirect()->route('myresources.create')->with('message_add','Post successfully added');
    }
}
