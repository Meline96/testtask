<?php

namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->comment->all();
    }

    /**
     * @param $params
     * @return mixed
     */
    public function create($params)
    {
        $attributes = [
            'user_id' => $params->user()->id,
            'post_id' => $params->post_id,
            'body' => $params->body,
        ];

        return $this->comment->create($attributes);
    }
}
