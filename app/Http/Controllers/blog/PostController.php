<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
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
            'author_id' => 'nullable|integer|exists:users,id',
            'tags' => 'nullable|array',  // Validate tags as an array if provided
            'tags.*' => 'integer|exists:tags,id',  // Validate each tag id exists
            'new_tag_en' => 'nullable|string',  // Validate new tags in English
            'new_tag_ar' => 'nullable|string'  // Validate new tags in Arabic
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

        // Handle existing tags
        if ($request->has('tags')) {
            $post->tags()->sync($request->tags);
        }

        // Handle new tags
        if ($request->has('new_tag_en') && !empty($request->new_tag_en)) {
            $newTagsEn = array_map('trim', explode(',', $request->new_tag_en));
            foreach ($newTagsEn as $newTagNameEn) {
                $tag = Tag::firstOrCreate(['name' => ['en' => $newTagNameEn, 'ar' => $request->new_tag_ar]]);
                $post->tags()->attach($tag->id);
            }
        }

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }






    public function show($id)
    {
        $locale = app()->getLocale(); // Get the current locale

        $post = Post::with('tags')->findOrFail($id);
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

        // Sync existing tags
        $post->tags()->sync($request->tags);

        // Handle new tags
        if ($request->has('new_tag') && !empty($request->new_tag)) {
            $newTags = array_map('trim', explode(',', $request->new_tag));
            foreach ($newTags as $newTagName) {
                $tag = Tag::firstOrCreate(['name' => $newTagName]);
                $post->tags()->attach($tag->id);
            }
        }


        return redirect()->route('post.index')->with('success', 'Post updated successfully');
    }





    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully');

    }


    public function addTagToPost(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $tag = Tag::firstOrCreate(['name' => $request->name]);  // Create the tag if it does not exist.
        $post->tags()->attach($tag->id);  // Attach the tag to the post.

        return redirect()->back()->with('message', 'Tag added successfully!');
    }

}
