<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function main()
    {
        return $this->category->parents();
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->category->all();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        $attributes = $params->all();

        return $this->category->create($attributes);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function read($id)
    {
        return $this->category->find($id);
    }
}
