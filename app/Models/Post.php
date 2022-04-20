<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'posts';

    protected $fillable = [
        'title', 'body', 'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function findBySlug($slug){
        return $this->where('slug', '=', $slug)->firstOrFail()->get();
    }
}
