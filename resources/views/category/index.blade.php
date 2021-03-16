@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('categories.create') }}"><button class="btn btn-dark">Create Category</button></a>
                @if($categories->isNotEmpty())
                    @include('category.category-tree', ['children' => $categories])
                @endif
            </div>
        </div>
    </div>
@endsection
