<?php

namespace App\Repositories;

use App\Repositories\Criteria\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        return $this->model::findOrfail($id);
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
        $model =   $this->model->where($column, $value)->get();
        $this->ModelNotFound($model);
        return $model;

 
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
        $model =  $this->model->where($column, $value)->first();

        $this->ModelNotFound($model);
        return $model;

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

   /**
     * filter with criteria
     *
     * @param [array] $criteria
     * @return object
     */
    public function withCriteria(...$criteria)
    {
        $criteria = array_flatten($criteria);

        foreach($criteria as $criterion) {

            $this->model = $criterion->apply($this->model);
        }

        return $this;
    }

    private function ModelNotFound($model)
    {
        if(!$model) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->model->getModel()));
        }
        return $model;
    }
}

