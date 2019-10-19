<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subject;

class subjectController extends Controller
{
    public function getSubject(){
        $subject = new subject;
        return $subject::all();
    }
}
