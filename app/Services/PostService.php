<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return $this->post->all();
    }

    public function find($id)
    {
        return $this->post->find($id);
    }

    public function update($params, $id)
    {
        $attributes = $params->all();

        return $this->post->update($attributes, $id);
    }

    public function create($params)
    {
        $attributes = $params->all();

        if ($params->has('file')) {
            $name = $this->post->uploadFile($params->file);
            $attributes['photo'] = $name;
        }

        $post = $this->post->create($attributes);

        if ($params->has('category_id')) {
            $this->post->addCategories($params->get('category_id', []), $post->id);
        }
    }

    public function search($params)
    {
        return $this->post->searchByCategory($params);
    }
}
