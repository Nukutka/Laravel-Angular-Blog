<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(PostRequest $request)
    {
         $post = Post::create($request->validated());
         return $post;
    }

    public function show($id)
    {
       $post = Post::findOrFail($id);
       return $post;
    }

    public function update(PostRequest $request, $id)
    {
         $post = Post::findOrFail($id);
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
