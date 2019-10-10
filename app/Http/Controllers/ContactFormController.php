<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\ContactFormMail;
use App\Mail\ContactFormMailReply;

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
		Mail::to(request()->email)->send(new ContactFormMail($data));
		Mail::to("cuongdz1507@gmail.com")->send(new ContactFormMailReply($data));

    	return redirect('contact')->with('message', 'Thanks for your message. We\'ll be in touch ');
    }
}
