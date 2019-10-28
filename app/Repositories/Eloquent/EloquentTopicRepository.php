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
/**
 * find topic by slug
 *
 * @param [string] $slug
 * @return void
 */
    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }
}

