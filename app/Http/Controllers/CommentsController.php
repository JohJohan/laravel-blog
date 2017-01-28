<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(10);

        return view('comments.index')->withComments($comments);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
            'comment' => 'required|min:5|max:2000'
        ));
        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment is posted');

        return redirect()->route('blog.single', [$post->slug]);

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request, array(
            'comment' => 'required'
        ));

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('posts.show', $comment->post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function delete($id)
     {
         $comment = Comment::find($id);

         return view('comments.delete')->withComment($comment);


     }


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $postid = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'The comment is deletead');

        return redirect()->route('posts.show', $postid);
    }
}
