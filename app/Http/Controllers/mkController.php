<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mkController extends Controller
{
    public function createTNS(){
        return view('mk.toolAndServices');
    }
    
    public function viewMk(){
        return view('discoverMk');    
    }
}
