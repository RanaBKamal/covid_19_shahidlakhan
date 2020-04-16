<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonateRequest;

class UserController extends Controller
{
	//allow only for verified users
	public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    //function to return donor request
    public function donationRequest(){
    	try {
    		$donateRequests = DonateRequest::all();
    	} catch (Exception $e) {
    		return view('erros.500');
    	}
    	return view('user.donation-request-list')->with(compact('donateRequests'));
    }
}
