<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\criteria\CriterionInterface;

class LatestFirst implements CriterionInterface
{
    /**
     * get objects order by create at (DESC)
     *
     * @param [OBJECT] $model
     * @return collection
     */
    public function apply($model)
    {
        return $model->latest();
    }

}

