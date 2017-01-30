<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use DB;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    // Make sure user is logged
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all()->paginate(10);
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        $tags = Tag::all();
        return view('posts.index')->withPosts($posts)->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, array(
            'title'            => 'required|max:255',
            'slug'             => 'required|alpha_dash|min:5|max:25|unique:posts,slug',
            'category_id'      => 'required|integer',
            'featured_image'   => 'sometimes|image',
            'body'             => 'required'
        ));
        // Store Database
        $post = New Post;

        $post->title            = $request->title;
        $post->slug             = $request->slug;
        $post->category_id      = $request->category_id;
        $post->body             = Purifier::clean($request->body);


    	// Save image
        if ($request->hasFile('featured_image')) {
            $image       = $request->file('featured_image');
            $filename    = time() . '.' . $image->getClientOriginalExtension();
            $location    = public_path('img/' . $filename);

            Image::make($image)->resize(800,400)->save($location);

            $post->featured_image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The post has been saved.');

        // Redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();
        return view('posts.show')->withPost($post)->withTags($tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $ta = array();
        foreach ($tags as $tag) {
            $ta[$tag->id] = $tag->name;
        }

        return view('posts.edit')->with('post', $post)->withCategories($cats)->withTags($ta);
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
        // validate check if slug already is, else post but not the slug.
        // dd($request);
        $this->validate($request, array(
            'title'            => 'required|max:255',
            'slug'             => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id'      => 'required|integer',
            'body'             => 'required',
            'featured_image'   => 'image',
        ));

        $post = Post::find($id);

        // Store
        $post->title           = $request->input('title');
        $post->slug            = $request->input('slug');
        $post->category_id     = $request->input('category_id');
        $post->body            = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
            // Add new photo
            $image       = $request->file('featured_image');
            $filename    = time() . '.' . $image->getClientOriginalExtension();
            $location    = public_path('img/' . $filename);

            Image::make($image)->resize(800,400)->save($location);

            $oldfilename = $post->featured_image;
            // Update db
            $post->featured_image = $filename;

            // Delete old photo
            Storage::delete($oldfilename);
        }

        $post->save();

        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }

        Session::flash('success', 'this post has been saved');

        // Redirect with flash to show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        if ($post->featured_image) {
            $oldfilename = $post->featured_image;

            Storage::delete($oldfilename);
        }

        $post->delete();

        Session::flash('success', 'The post is deletead');

        return redirect()->route('posts.index');
    }
}
