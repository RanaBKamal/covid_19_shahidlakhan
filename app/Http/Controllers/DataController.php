<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonateRequest;

class DataController extends Controller
{
    //function to store donate request data
    public function storeDonateRequestData(Request $request){
    	try {
    		$name = request('name');
    		$p_address = request('p_address');
    		$c_address = request('c_address');
    		$email = request('email');
    		$contact = request('contact');
    		$amount = request('amount');
    		$other_help = request('other_help');

    		$donate_request = new DonateRequest();
    		$donate_request->name = $name;
    		$donate_request->permanent_address = $p_address;
    		$donate_request->current_address = $c_address;
    		$donate_request->email = $email;
    		$donate_request->contact = $contact;
    		$donate_request->amount = $amount;
    		$donate_request->other_help = $other_help;
    		$donate_request->save();

    	} catch (Exception $e) {
    		return response()->json([
	            'response' => false,
	        ]);
    	}
    	return response()->json([
            'response' => true,
        ]);
    }
}
