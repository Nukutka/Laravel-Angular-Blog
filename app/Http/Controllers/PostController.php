<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(PostRequest $request)
    {
         $request->validated();
         $user = Auth::user();
         $model = array(
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,  
            'user_id'=> $user->id
        );
         $post = Post::create($model);
         return $post;
    }

    public function show($id)
    {
       $post = Post::findOrFail($id);
       return response()->json($post);
    }

    public function update(PostRequest $request, $id)
    {
         $post = Post::findOrFail($id);
         $user = Auth::user();

         if ($user->id != $post->user_id)
            return response()->json(['error'=>'Forbidden update this post'], 403);

         $post->fill($request->validated());
         $post->save();
         return response()->json($post);
    }

     public function destroy($id)
     {
         $post = Post::findOrFail($id);
         if ($post->delete()) return response(null, 204);
     }
}
