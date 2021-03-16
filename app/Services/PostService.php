<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

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

    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->post->update($id, $attributes);
    }

    public function create(Request $request)
    {
        $attributes = $request->all();

        if ($request->has('file')) {
            $name = $this->post->uploadFile($request->file);
            $attributes['photo'] = $name;
        }

        $post = $this->post->create($attributes);

        if ($request->has('category_id')) {
            $this->post->addCategories($request->get('category_id', []), $post->id);
        }
    }
}
