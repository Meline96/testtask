@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('categories.create') }}"><button class="btn btn-dark">Create Category</button></a>
                @endif
                @if($categories->isNotEmpty())
                    @include('category.category-tree', ['children' => $categories])
                @else
                    <p>There is no category till now!!!</p>
                @endif
            </div>
        </div>
    </div>
@endsection
