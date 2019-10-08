<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class loginController extends Controller
{
    public function insert(Request $req){
    	// $data = request()->validate([
    	// 	"name" => "required",
    	// 	"institution" => "required",
    	// 	"address" => "required",
    	// 	"city" => "required",
    	// 	"state" => "required",
    	// 	"country" => "required",
    	// 	"zipcode" => "required",
    	// 	"position" => "required",
    	// 	"link" => "required",
    	// 	"email" => "required|email",
    	// 	"password" => "required",
    	// ]);
    	$name = $req->input("name");
    	$institution = $req->input("institution");
    	$address = $req->input("address");
    	$city = $req->input("city");
    	$state = $req->input("state");
    	$country = $req->input("country");
    	$zipcode = $req->input("zipcode");
    	$position = $req->input("position");
    	$link = $req->input("link");
    	$email = $req->input("email");
    	$password = $req->input("password");
    	$phone = $req->input("phone");

    	$data = array(
    		"name" => $name,
	    	"institution" => $institution,
	    	"address" => $address,
	    	"city" => $city,
	    	"state" => $state,
	    	"country" => $country,
	    	"zipcode" => $zipcode,
	    	"position" => $position,
	    	"link" => $link,
	    	"email" => $email,
	    	"password" => $password,
	    	"phone" => $phone,
    	);
    	$user = DB::table('users')->where('email',$email)->get();
    	if ( $user = null )
    		DB::table('users')->insert($data);
    	else{
    		return view('register', ["show"=>"no"]);
    	}
	}
	
	public function changepw(){
		$user = new User();
		if (request()->ajax()){
			$newpassword = Hash::make(request()->get('newpw'));
			$user::find(Auth::user()->id)->update(["password" => $newpassword]);
			return "ok";
		}
	}

	public function updateProfile(){
		$user = new User;
		$user::where('id','=', request()->userid)
		->update([
			'name' => request()->name,
			'email' => request()->email,
			'country' => request()->country,
			'address' => request()->address,
			'phone' => request()->phone,
			'institution' => request()->institution,
			'position' => request()->position,
		]);
		return back()->with(["updateProfile","Your profile updated successfully!"]);
	}
}
