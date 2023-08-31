<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->description);

        SEOMeta::addMeta('article:published_time', $post->created_at->diffForHumans(), 'property');
        SEOMeta::addMeta('article:section', $post->category->name, 'property');
        SEOMeta::addKeyword([$post->keywords]);

        OpenGraph::setDescription($post->description);
        OpenGraph::setTitle($post->title);
        OpenGraph::setUrl(url()->current());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage(asset('storage/'.$post->cover_image), ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->description);
        JsonLd::setType('Article');
        JsonLd::addImage(asset('storage/'.$post->cover_image));

        $sessionKey = 'viewed_post_' . $post->id;

        if (!session()->has($sessionKey)) {
            $post->increment('view_count');
            session()->put($sessionKey, true);
        }

        $category = $post->category;

        $similarPosts = Post::where('category_id', $category->id)
            ->where('id', '!=', $post->id)->where('is_visible', 1)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $nextPost =  Post::where('slug', '>', $post->slug)->orderBy('slug', 'asc')->first();

        $previousPost =  Post::where('slug', '<', $post->slug)->orderBy('slug', 'desc')->first();
        $profile = $post->user->profile;
        return view('posts.show', [
            'post' => $post,
            'nextPost' => $nextPost,
            'previousPost' => $previousPost,
            'similarPosts' => $similarPosts,
            'viewsCount' => $post->view_count,
            'profile' => $profile,
        ]);
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'duration' => 'required|integer|min:0',
        ]);

        // Store the duration in the database
        $post = Post::find($validatedData['post_id']);
        $post->increment('total_duration', $validatedData['duration']);

        return response()->json(['message' => 'Duration stored successfully']);
    }
}
