<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all instances of model.
     *
     * @return mixed
     */
    public function all();

    /**
     *  create a new record in the database.
     *
     * @param array $data
     */
    public function create(array $data);

    /**
     *  find record in the database.
     *
     * @param int $id
     */
    public function find(int $id);

    /**
     * update record in the database.
     *
     * @param array $data
     * @param $where
     */
    public function update(array $data, $where);

    /**
     * remove record from the database
     *
     * @param data
     */
    public function delete($data);

    /**
     *  Where record in the database.
     *
     * @param array $data
     * @return mixed
     */
    public function where(array $data);

    /**
     *  Where first record in the database.
     *
     * @param array $data
     * @return mixed
     */
    public function whereOne(array $data);

    /**
     *  Where not in record in the database.
     *
     * @param string $field
     * @param array $data
     * @return mixed
     */
    public function whereNotIn(string $field,array $data);


    /**
     *  Where like record in the database.
     *
     * @param array $data
     * @return mixed
     */
    public function whereLike(array $data);

    /**
     * Sets relations for eager loading.
     *
     * @param $relations
     * @return $this
     */
    public function with($relations);

    /**
     * order by record from the database
     *
     * @param string $orderBy
     * @oaram string $orderDirection
     */
    public function orderBy(string $orderBy,string $orderDirection);
}
