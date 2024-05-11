<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = app()->getLocale(); // Get the current locale
        $posts = Post::all()->map(function ($post) use ($locale) {
            // Fetch the translation for the current locale
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        $recentPosts = Post::orderBy('id', 'desc')->take(3)->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        return view('blog.post.index', compact('posts','recentPosts'));
    }



    public function create()
    {
        $locale = app()->getLocale(); // Get the current locale
        $recentPosts = Post::orderBy('id', 'desc')->take(3)->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        return view('blog.post.create', compact('recentPosts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'body_en' => 'required|string',
            'body_ar' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'status' => 'required|in:published,draft',
            'type' => 'required|in:post,page,featured',
            'author_id' => 'nullable|integer|exists:users,id'
        ]);

        if (empty($request->slug)) {
            $request['slug'] = Str::slug($request->title_en); // Default slug to English title
        }

        $post = new Post($request->only('slug', 'status', 'type', 'author_id'));
        $post->setTranslation('title', 'en', $request->title_en);
        $post->setTranslation('title', 'ar', $request->title_ar);
        $post->setTranslation('body', 'en', $request->body_en);
        $post->setTranslation('body', 'ar', $request->body_ar);
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }




    public function show($id)
    {
        $locale = app()->getLocale(); // Get the current locale

        $post = Post::find($id);
        $featuredPosts = Post::with('user')->where('type', 'featured')->get();

        $recentPosts = Post::orderBy('id', 'desc')->take(3)->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });


        return view('blog.post.show',compact('post','featuredPosts','recentPosts'));
    }


    public function edit($id)
    {
        $locale = app()->getLocale(); // Get the current locale

        $recentPosts = Post::orderBy('id', 'desc')->take(3)->get()->map(function ($post) use ($locale) {
            $post->title = $post->getTranslation('title', $locale);
            $post->body = $post->getTranslation('body', $locale);
            return $post;
        });

        // Retrieve the post by ID, handle the case where the post is not found
        $post = Post::findOrFail($id);

        // Pass the post to the edit view
        return view('blog.post.edit', compact('post','recentPosts'));
    }


    /*public function update(Request $request, $id)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'body_en' => 'required|string',
            'body_ar' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $id,
            'status' => 'required|in:published,draft',
            'type' => 'required|in:post,page,featured',
            'author_id' => 'nullable|integer|exists:users,id'
        ]);

        $post = Post::findOrFail($id);
        $post->fill($request->only('slug', 'status', 'type', 'author_id'));
        $post->setTranslation('title', 'en', $request->title_en);
        $post->setTranslation('title', 'ar', $request->title_ar);
        $post->setTranslation('body', 'en', $request->body_en);
        $post->setTranslation('body', 'ar', $request->body_ar);
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }*/

    public function update(Request $request, $id)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'body_en' => 'required|string',
            'body_ar' => 'required|string',
            'slug' => 'nullable|string|max:255|unique:posts,slug,' . $id,
            'status' => 'required|in:published,draft',
            'type' => 'required|in:post,page,featured',
            'author_id' => 'nullable|integer|exists:users,id'
        ]);

        $post = Post::findOrFail($id);
        $post->fill($request->only(['slug', 'status', 'type', 'author_id']));
        $post->setTranslation('title', 'en', $request->title_en);
        $post->setTranslation('title', 'ar', $request->title_ar);
        $post->setTranslation('body', 'en', $request->body_en);
        $post->setTranslation('body', 'ar', $request->body_ar);
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }





    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');

    }
}
