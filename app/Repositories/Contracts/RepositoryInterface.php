<?php

namespace App\Repositories\Contracts;


interface RepositoryInterface
{
    /**
     * Get all
     *
     * @return collection
     */
    public function all();

    /**
     * Fin by id
     *
     * @param [int] $id
     * @return object
     */
    public function find($id);

    /**
     * find where column
     *
     * @param [string] $column
     * @param [type] $value
     * @return collection
     */
    public function findWhere($column, $value);

    /**
     * find 
     *
     * @param [type] $column
     * @param [type] $vlue
     * @return object
     */
    public function findWhereFirst($column, $value);

    /**
     * pagination function
     *
     * @param [int] $perpage
     * @return void
     */
    public function paginate($perpage);

    /**
     * create new object
     *
     * @param array $propreties
     * @return void
     */
    public function create(array $propreties);

    /**
     * Undocumented function
     *
     * @param [int] $id
     * @param array $propreties
     * @return void
     */
    public function update($id, array $propreties);

    /**
     * Undocumented function
     *
     * @param [int] $id
     * @return void
     */
    public function delete($id);


}

