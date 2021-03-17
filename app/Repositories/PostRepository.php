<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;

class PostRepository extends Repository
{
    /**
     * @var $model
     * @var $categoryModel
     */
    protected $model;
    protected $categoryModel;

    public function __construct(Post $post, Category $category)
    {
        $this->model = $post;
        $this->categoryModel = $category;
    }

    /**
     * @param $file
     * @return string
     */
    public function uploadFile($file)
    {
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $file->move($destinationPath, $name);

        return $name;
    }

    /**
     * @param $categories
     * @param $id
     */
    public function addCategories($categories, $id)
    {
        $post = $this->model->find($id);
        $post->categories()->sync($categories);
    }

    public function searchByCategory($categoryId)
    {
        $result = $this->model->whereHas(
            'categories',
            function ($q) use ($categoryId) {
                $q
                    ->where('categories.id', $categoryId)
                    ->orWhere('categories.parent_id', $categoryId)
                ;
            }
        )->get();

        return $result;
    }
}
