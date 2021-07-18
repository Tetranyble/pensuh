<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Classes;
use App\School;
use App\Services\Schools;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    protected $schools;
    public function __construct(Schools $schools)
    {
        $this->schools = $schools;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Schools $schools)
    {
        if (request('tag')){
            $blogs = Tag::where('school_id', $schools->id())->where('slug', request('tag'))->firstOrFail()->blogs()->paginate();
        }elseif (request('category')){
            $blogs = Category::where('school_id', $schools->id())->where('slug', request('category'))->firstOrFail()->blogs()->paginate();
        }elseif (request('search')){
            $blogs = Blog::where('school_id', $schools->id())->where([

                ['name', 'LIKE', '%' . Str::lower(request('search')) . '%'],
            ])->latest()->paginate();
        } else{
            $blogs = Blog::where('school_id', $schools->id())->paginate();
        }

        $latestBlogs = Blog::where('school_id', $schools->id())->orderBy('created_at', 'desc')->take(3)->get();

        $tags = Tag::where('school_id', $schools->id())->get();
        $categories = Category::where('school_id', $schools->id())->withCount('blogs')->get();
        return view('frontend.blogs', compact('blogs', 'tags', 'categories', 'latestBlogs'));
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
    public function show(Blog $blog, $news, Schools $schools)
    {

        if (request('tag')){
            $blogs = Tag::where('school_id', $schools->id())->where('slug', request('tag'))->firstOrFail()->blogs()->paginate();
        }elseif (request('category')){
            $blogs = Category::where('school_id', $schools->id())->where('slug', request('category'))->firstOrFail()->blogs()->paginate();
        }elseif (request('search')){
            $blogs = Blog::where('school_id', $schools->id())->where([

                ['name', 'LIKE', '%' . Str::lower(request('search')) . '%'],
            ])->latest()->paginate();
        } else{
            $blogs = Blog::where('school_id', $schools->id())->paginate();
        }
        $latestBlogs = Blog::where('school_id', $schools->id())->orderBy('created_at', 'desc')->take(3)->get();

        $tags = Tag::where('school_id', $schools->id())->get();
        $categories = Category::where('school_id', $schools->id())->withCount('blogs')->get();
        if (request('tag') || \request('category')){
            return view('frontend.blogs', compact('blogs', 'tags', 'categories', 'latestBlogs', 'home'));
        }
        $blog = Blog::where('school_id', $schools->id())->whereSlug($news)->first();

        return view('frontend.blog', compact('blog', 'tags', 'categories', 'latestBlogs'));
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
