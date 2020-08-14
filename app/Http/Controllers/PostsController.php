<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * display all posts from database
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(){
        $posts = Post::orderBy('id', 'desc')->get();
        return PostResource::collection($posts);
    }

    /**
     * store a new post
     * @param FormPostRequest $request
     * @return PostResource
     */
    public function store(FormPostRequest $request){
        $data = [
            'desc' => $request->validated()['desc'],
            'user_id' => $request->user()->id
        ];
        $post = Post::create($data);

        return new PostResource($post);
    }

    /**
     * delete an existing post
     * @param Post $post
     * @throws \Exception
     */
    public function destroy(Post $post){
        $post->delete();
    }
}
