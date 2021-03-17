@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('posts.create') }}"><button class="btn btn-dark mb-3">Create Post</button></a>
                @if ( !$posts->count() )
                    There is no post till now. Login and write a new post now!!!
                @else
                    @if($categories->isNotEmpty())
                    <form class="search-form" action="{{ route('posts.search') }}">
                        <div class="d-flex col-md-12 pl-0 pr-0">
                            <div class="form-group col-md-10  pl-0 pr-0">
                                <select name="category_id" class="form-control rounded" name="parent_id" id="">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="button" class="btn btn-outline-primary search-button col-md-2 mb-3">search</button>
                        </div>
                    </form>
                    @endif
                        <div class="post-content">
                            @include('post.list', ['posts' => $posts])
                        </div>
                @endif
            </div>
        </div>
    </div>
    <script src="{{ asset('js/posts/index.js') }}" defer></script>
@endsection
