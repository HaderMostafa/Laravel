<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function show($postId)
    {
        return Post::find($postId);
    }

    public function store(StorePostRequest $request)
    {
        $data = request()->all();
       
        $post = Post::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],
            'img'=>$data['image'],
        ]);

        return $post;
    }
}
