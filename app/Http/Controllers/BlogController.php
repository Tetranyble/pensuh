<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\School;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('tag')){
            $blogs = Tag::where('slug', request('tag'))->firstOrFail()->blogs()->paginate();
        }elseif (request('category')){
            $blogs = Category::where('slug', request('category'))->firstOrFail()->blogs()->paginate();
        }elseif (request('search')){
            $blogs = Blog::where([

                ['name', 'LIKE', '%' . Str::lower(request('search')) . '%'],
            ])->latest()->paginate();
        } else{
            $blogs = Blog::paginate();
        }
        $home = School::first();
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        $tags = Tag::all();
        $categories = Category::withCount('blogs')->get();

        return view('frontend.blogs', compact('blogs', 'tags', 'categories', 'latestBlogs', 'home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog, $news)
    {

        if (request('tag')){
            $blogs = Tag::where('slug', request('tag'))->firstOrFail()->blogs()->paginate();
        }elseif (request('category')){
            $blogs = Category::where('slug', request('category'))->firstOrFail()->blogs()->paginate();
        }elseif (request('search')){
            $blogs = Blog::where([

                ['name', 'LIKE', '%' . Str::lower(request('search')) . '%'],
            ])->latest()->paginate();
        } else{
            $blogs = Blog::paginate();
        }
        $home = School::first();
        $latestBlogs = Blog::orderBy('created_at', 'desc')->take(3)->get();

        $tags = Tag::all();
        $categories = Category::withCount('blogs')->get();
        if (request('tag') || \request('category')){
            return view('frontend.blogs', compact('blogs', 'tags', 'categories', 'latestBlogs', 'home'));
        }
        $blog = Blog::whereSlug($news)->first();
        return view('frontend.blog', compact('blog', 'tags', 'categories', 'latestBlogs', 'home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
