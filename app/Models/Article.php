<?php

namespace App\Models;

use Illuminate\Support\Str;

class Article
{
    public function __construct()
    {
        $this->database = \App\Services\FirebaseService::connect();
    }

    public function get(){
        return $this->database
            ->getReference('articles')
            ->getValue();
    }

    public function findBySlug(String $slug){
        return $this->database
            ->getReference('articles/'.$slug)
            ->getValue();
    }

    public function create($request){
        return $this->database
            ->getReference('articles/'.($request["slug"]??Str::slug($request["title"])))
            ->set($request)
            ->getValue();
    }

    public function updateBySlug(Array $request, String $slug){
        
        $article = $this->database
            ->getReference('articles/'.$slug)
            ->getValue();

        if($article) {
            $newArticle = $this->database
                ->getReference('articles/'.($request["slug"]??Str::slug($request["title"])))
                ->set($request)
                ->getValue();

            if($slug !== $request['slug']){
                $this->database
                    ->getReference('articles/'.$slug)
                    ->remove();
            }
            return $newArticle;
        }
        return FALSE;
    }

    public function deleteBySlug(String $slug){
        $article = $this->database
            ->getReference('articles/'.$slug)
            ->getValue();

        if($article) {
            return $this->database
                ->getReference('articles/'.$slug)
                ->remove();
        }
        return FALSE;
    }
}
