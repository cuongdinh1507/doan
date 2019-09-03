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
    	]);

    	DB::table('project_personel')->insert([
    		'user_id' => request()->userid,
    		'title_id'=> $id,
    		'name' => Auth::user()->name,
    		'role' => request()->role,
    		'institution' => Auth::user()->institution,
    		'email' => Auth::user()->email,
    		'phone' => Auth::user()->phone,
    	]);

    	return redirect()->route('myresources.create')->with('message_add','Post successfully added');
    }
}
