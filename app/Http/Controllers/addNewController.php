<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addNewController extends Controller
{
    public function create(){
    	return view('addNew');
    }

    public function add(){
    	dd(request()->all());
    }
}
