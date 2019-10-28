<?php

namespace App\Repositories\Eloquent\Criteria;

use App\Repositories\criteria\CriterionInterface;

class ByUser implements CriterionInterface
{

    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get objects created by user
     *
     * @param [object] $model
     * @return collection
     */
    public function apply($model)
    {
        return $model->where('user_id', $this->userId);
    }

}

