<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        return PostResource::collection($posts);
    }

    public function store(FormPostRequest $request){
        $post = Post::create($request->validated());
        return new PostResource($post);
    }

    public function destroy(Post $post){
        $post->delete();
    }
}
