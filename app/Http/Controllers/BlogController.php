<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Comment;
use App\Tag;

class BlogController extends Controller
{
    public function getIndex(){
        $post = Post::orderBy('id', 'desc')->paginate(5);

        return view('blog.index')->withPosts($post);
    }

    public function getSingle($slug){
        $post = Post::where('slug', '=', $slug)->first();
        $comments = Comment::where('post_id', '=', $post->id)->paginate(10);
        return view('blog.single')->withPost($post)->withComments($comments);
    }


}
