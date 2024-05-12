<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = app()->getLocale(); // Get the current locale

        // Featured Posts
        $featuredPosts = Post::with('user')->where('type', 'featured')->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        // Page Posts
        $pagePosts = Post::with('user','tags')->where('type', 'page')->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        // Regular Posts
        $regularPosts = Post::with('user')->where('type', 'post')->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        // Recent Posts
        $recentPosts = Post::orderBy('id', 'desc')->take(3)->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        return view('blog.index', compact('featuredPosts', 'pagePosts', 'regularPosts', 'recentPosts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
