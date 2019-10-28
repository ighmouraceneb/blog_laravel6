<?php

namespace App\Repositories\Eloquent;

use App\ {
    Repositories\Contracts\TopicRepository,
    Repositories\RepositoryAbstract,
    Topic
};


class EloquentTopicRepository extends RepositoryAbstract implements TopicRepository
{
    public function model()
    {
        return Topic::class; //'App\Topic'
    }
}

