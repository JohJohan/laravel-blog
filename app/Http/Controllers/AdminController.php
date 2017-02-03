<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('admin.index', array('user' => Auth::user() ))->withPosts($posts);
    }

    public function pages(){
        dd('test');
    }


}
