<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index()
    {
        return new PostCollection($this->post->get());
    }

    public function show(String $slug)
    {
        return new PostResource($this->post->findBySlug($slug));
    }

    public function store(PostRequest $request)
    {
        return new PostResource($this->post->create($request->validated()));
    }

    public function update(PostRequest $request, Post $post)
    {
        return new PostResource($post->update($request->validated()));
    }

    public function destroy(Post $post)
    {
        $post->delete();  
    }
}
