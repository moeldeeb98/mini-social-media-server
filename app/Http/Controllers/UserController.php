<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /** get all posts that posted by a specific user
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function timeline(){
        $user = User::findOrFail(request()->user()->id);
        $posts = $user->posts()->OrderBy('id', 'desc')->get();
        return PostResource::collection($posts);
    }
}
