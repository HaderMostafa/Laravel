<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\Models\Post;

use App\Models\User;

use Carbon\Carbon;

use App\Http\Requests\StorePostRequest;

use App\Jobs\PruneOldPostsJob;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3); 

        //PruneOldPostsJob::dispatch(); //Task Schedule

        return view('posts.index',[
            'posts' => $posts,
        ]);

    }

    public function create()
    {
        $users=User::all();
       
        return view('posts.create',['users'=> $users]);
    }

    public function store(StorePostRequest $request)
    {
        $data = request()->all();
       
        Post::create([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],
        ]);
        
        return to_route('posts.index');
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        
        $userId =$post->user_id;
        
        $user= User::where('id', '=', $userId )->first();
        
        return view('posts.show',['post'=> $post,'user'=>$user]);
    }

    public function edit($postId)
    {
       $post = Post::find($postId); 
       
       $users=User::all();  
       
       return view('posts.edit',['post'=> $post,'users'=> $users]);
    }

    public function update(StorePostRequest $request, $postId)
    {
        $data = request()->all();
        
        Post::where('id', $postId)->update([
            'title'=>$data['title'],
            'description'=>$data['description'],
            'user_id'=>$data['post_creator'],
        ]);
            
        return to_route('posts.index');
    }

    public function destroy($postId)
    {
        $post= Post::find($postId)->delete();
        
        return to_route('posts.index');
    }
}