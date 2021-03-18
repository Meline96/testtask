<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;
    protected $commentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostService $postService, CategoryService $categoryService, CommentService $commentService)
    {
        $this->middleware('auth');
        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->commentService = $commentService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postService->index();
        $categories = $this->categoryService->get();

        return view('post.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->get();

        return view('post.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $this->postService->create($request);

        return redirect(route('posts.index'));
    }

    public function show($id)
    {
        $post = $this->postService->find($id);

        return view('post.show', compact('post'));
    }

    public function search(Request $request)
    {
        $categoryId = $request->category_id;

        $posts = $this->postService->search($categoryId);

        $returnHTML = view('post/list', [
            'posts' => $posts
        ])->render();

        return response()->json(['success' => true, 'html' => $returnHTML]);
    }

    public function addComment(CommentRequest $request)
    {
        $this->commentService->create($request);

        return redirect(route('posts.show', $request->post_id));
    }

    public function addLike($postId)
    {
        auth()->user()->votedPosts()->detach($postId);
        auth()->user()->votedPosts()->attach($postId, ['is_dislike' => 0]);

        return redirect()->back();
    }

    public function removeLike($postId)
    {
        auth()->user()->votedPosts()->detach($postId);
        auth()->user()->votedPosts()->attach($postId, ['is_dislike' => 1]);

        return redirect()->back();
    }
}
