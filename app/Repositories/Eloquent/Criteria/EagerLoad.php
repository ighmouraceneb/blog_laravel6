<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\criteria\CriterionInterface;

class EagerLoad implements CriterionInterface
{
    protected $relations;

    public function __construct( array $relations)
    {
        $this->relations = $relations; 
    }

    public function apply($model)
    {
        return $model->with($this->relations);
    }
    
}

