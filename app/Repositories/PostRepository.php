<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;
use Facade\FlareClient\Http\Response;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Storage;

class PostRepository
{

    protected $post;
    protected $category;

    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        return $this->post->create($attributes);
    }

    /**
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->post->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->post->find($id);
    }

    /**
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        return $this->post->find($id)->update($attributes);
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
        $post = $this->post->find($id);

        $post->categories()->sync($categories);
    }
}
