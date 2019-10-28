<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Criteria\CriteriaInterface;

abstract class RepositoryAbstract implements RepositoryInterface, CriteriaInterface
{

    protected $model;
    
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public abstract function model();

    public function all()
    {
        return $this->model->get();
    }

    public function resolveModel()
    {
        return app()->make($this->model());
    }

    /**
     * Fin by id
     *
     * @param [int] $id
     * @return object
     */
    public function find($id)
    {
        return $this->model::find($id);
    }

    /**
     * find where column
     *
     * @param [string] $column
     * @param [type] $value
     * @return collection
     */
    public function findWhere($column, $value)
    {
        return $this->model::where($column, $value)->get();
    }

    /**
     * find 
     *
     * @param [type] $column
     * @param [type] $vlue
     * @return object
     */
    public function findWhereFirst($column, $value)
    {
        return $this->model::where($column, $value)->first();
    }

    /**
     * pagination function
     *
     * @param [int] $perpage
     * @return void
     */
    public function paginate($perpage)
    {
        return $this->model->paginate($perpage);
    }

    /**
     * create new object
     *
     * @param array $propreties
     * @return void
     */
    public function create(array $propreties)
    {
        return $this->model::create($propreties);
    }

    /**
     * Undocumented function
     *
     * @param [int] $id
     * @param array $propreties
     * @return void
     */
    public function update($id, array $propreties)
    {
        return $this->find($id)->update($propreties);
    }

    /**
     * Undocumented function
     *
     * @param [int] $id
     * @return void
     */
    public function delete($id)
    {
        return $this->find($id)->delete($id);
    }

    public function withCriteria(...$criteria)
    {
        $criteria = array_flatten($criteria);

        foreach($criteria as $criterion) {

            $this->model = $criterion->apply($this->model);
        }

        return $this;
    }
}

