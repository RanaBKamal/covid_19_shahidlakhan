<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\User;
use TCG\Voyager\Models\Category;

class PostController extends Controller
{
    //function to return post page
    public function index($slug){
    	try {
    		$post = Post::where('slug', $slug)->firstOrFail();
    	} catch (Exception $e) {
    		return view('errors.500');
    	}
    	return view('post')->with(compact('post'));
    }
    // function to get posts from the category
    public function postsFromCategory($slug){
    	try {
    		$category = Category::where('slug', $slug)->firstOrFail();
    		$posts = $category->posts;
    	} catch (Exception $e) {
    		
    	}
    	return view('category')->with(compact('posts'));


    }
}
