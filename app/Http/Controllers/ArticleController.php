<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
    
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => new ArticleCollection($this->article->get())
        ], Response::HTTP_OK);
    }

    public function show(String $slug)
    {   
        $article = $this->article->findBySlug($slug);
        if($article){
            return response()->json([
                'status' => 'success',
                'article' => new ArticleResource($article)
            ], Response::HTTP_OK);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Article not found',
        ], Response::HTTP_NOT_FOUND);
    }

    public function store(ArticleRequest $request)
    {
        $article = $this->article->create($request->validated());
        if($article){
            return response()->json([
                'status' => 'success',
                'message' => 'Article successfully stored',
                'article' => new ArticleResource($article)
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Failed to store article',
        ], Response::HTTP_BAD_REQUEST);
    }

    public function update(ArticleRequest $request, String $slug)
    {
        $article = $this->article->updateBySlug($request->validated(), $slug);
        if($article){
            return response()->json([
                'status' => 'success',
                'message' => 'Article successfully updated',
                'article' => new ArticleResource($article)
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Failed to update article. Article not found',
        ], Response::HTTP_NOT_FOUND);
    }

    public function destroy(String $slug)
    {
        $article = $this->article->deleteBySlug($slug);
        if($article){
            return response()->json([
                'status' => 'success',
                'message' => 'Article successfully deleted',
            ], Response::HTTP_OK);
        }
        return response()->json([
            'status' => 'fail',
            'message' => 'Failed to delete article. Article not found',
        ], Response::HTTP_NOT_FOUND);
    }
}
