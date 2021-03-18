@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="list-group mt-3 mb-3">
                    <div class="list-group-item">
                        <h3>{{ $post->name }}</h3>
                        @if($post->photo)
                            <div>
                                <img width="200px" src="{{url('/images/'.$post->photo)}}" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="list-group-item">
                        <div>
                        <strong>Description:</strong>
                            {!! Str::limit($post->description, $limit = 1500, $end = '....... <a href='.url("/".$post->id).'>Read More</a>') !!}
                        <p>
                            <strong>Created date:</strong> {{ $post->created_at->format('M d,Y \a\t h:i a') }}
                        </p>
                        </div>
                        <div>
                            <strong>Categories:</strong> {{ $post->categoriesNames() }}
                            <div class="float-sm-right">
                                @if($post->isLiked())
                                    <a class="like-button liked" href="{{ route('post.removeLike', $post->id) }}">LIKED</a>
                                @else
                                    <a class="like-button not-liked" href="{{ route('post.addLike', $post->id) }}">LIKE</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if ($post->comments)
                        @include('post.comments', ['comments' => $post->comments])
                    @endif

                    <div class="list-group-item">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('posts.comment') }}">
                            <div class="form-group">
                                <label for="replyFormComment">Add comment</label>
                                <textarea class="form-control" name="body" rows="5"></textarea>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-info btn-md float-sm-right" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
