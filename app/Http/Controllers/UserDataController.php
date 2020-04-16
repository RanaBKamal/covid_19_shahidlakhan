<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDataController extends Controller
{
    //construct for authorized data controlling
	public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
}
