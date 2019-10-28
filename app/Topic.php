<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'slug', 'user_id'];


    /**
     * relation : a topic has manay posts
     *
     * @return void
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}