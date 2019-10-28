<?php

namespace App\Repositories\Eloquent;

use App\ {
    Topic,
    Repositories\Contracts\TopicRepository
};

class EloquentTopicRepository implements TopicRepository
{
    public function all()
    {
        return Topic::get();
    }
}

