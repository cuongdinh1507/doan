<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function create(){
    	return view("contact.create");
    }
    public function store(){
    	$data = request()->validate([
    		"name" => "required",
    		"email" => "required|email",
    		"organization" => "required",
    		"field" => "required",
    		"subject" => "required",
    		"message" => "required",
    	]);
    	Mail::to("cuongdz1507@gmail.com")->send(new ContactFormMail($data));

    	return redirect('Contact');
    }
}
