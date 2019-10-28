<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;
use App\User;


class Post extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'topic_id'];
    /**
     * relation : a post belongs to a single topic
     *
     * @return object
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    /**
     * relation : a post belongs to a single user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
