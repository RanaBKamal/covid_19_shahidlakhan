<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Link;
use App\Package;
use App\PackageHolder;
use App\Donor;
use App\QuarentinePoint;
use App\HealthPoint;
use TCG\Voyager\Models\Category;


class PagesController extends Controller
{
    //function to handle home page
	public function index(){
		try {
			$links = Link::all();
			$notice = Category::where('slug', 'notice')->firstOrFail();
			$notices = $notice->posts->take(5);
			$new = Category::where('slug', 'news')->firstOrFail();
			$news = $new->posts->take(5);
			$qpoints = QuarentinePoint::all();
			$hpoints = HealthPoint::all();
		} catch (Exception $e) {
			return view('errors.500');
		}
		return view('dashboard')->with(compact('links'))->with(compact('notices'))->with(compact('qpoints'))->with(compact('hpoints'))->with(compact('news'));
	}

	//function to return package detail
	public function eateryPackage(){
		try {
			$packageItems = Package::all();
		} catch (Exception $e) {
			return view('errors.500');	
		}
		return view('pages.eatery-package')->with(compact('packageItems'));
	}

	// function to return package holders naem
	public function packageHolder(){
		try {
			$packageHolders = PackageHolder::all();
		} catch (Exception $e) {
			return view('errors.500');	
		}
		return view('pages.package-holder')->with(compact('packageHolders'));	
	}
	//function to return donors
	public function donors(){
		try {
			$donors = Donor::all();
		} catch (Exception $e) {
			return view('errors.500');	
		}
		return view('pages.donors')->with(compact('donors'));
	}
	//function to return donate now view
	public function donateNow(){
		return view('pages.donate-now');
	}

}
