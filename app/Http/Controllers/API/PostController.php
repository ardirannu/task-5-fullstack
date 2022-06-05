<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePost;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostResource::collection(Post::with('category')->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePost $request)
    {
        $input = $request->all();
        $post = Post::create($input);
   
        return new PostResource($post);
    }  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (is_null($post)) {
            return $this->sendError('Post not found.');
        }
   
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePost $request, Post $post)
    {
        $input = $request->all();
   
        $post->category_id = $input['category_id'];
        $post->title = $input['title'];
        $post->desc = $input['desc'];
        $post->content = $input['content'];
        $post->author = $input['author'];
        $post->save();
   
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
   
        return response()->json([
            'type' =>'success',
        ]);
    }
}
