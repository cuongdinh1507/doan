<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\event;

class eventController extends Controller
{
    public function getEvent(){
        $event = new event;
        return event::orderBy('id','desc')->take(4)->get();
    }
}
