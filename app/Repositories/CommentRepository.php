<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository extends Repository
{
    /**
     * @var $model
     */
    protected $model;
    /**
     *  Construct.
     *
     * @param $comment
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}
