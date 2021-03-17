<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\CategoryService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostService $postService, CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->postService = $postService;
        $this->categoryService = $categoryService;
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

    public function search(Request $request)
    {
        $categoryId = $request->category_id;

        $posts = $this->postService->search($categoryId);

        $returnHTML = view('post/list', [
            'posts' => $posts
        ])->render();

        return response()->json(['success' => true, 'html' => $returnHTML]);
    }
}
