<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{
    /**
     * @var $model
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $category
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
