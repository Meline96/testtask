<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class CategoriesController extends Controller
{
    protected $categoryService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['create', 'store']);
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->main();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->get();

        return view('category.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->create($request);

        return redirect(route('categories.index'));
    }
}
