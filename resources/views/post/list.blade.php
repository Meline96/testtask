<div class="post-list">
    @foreach( $posts as $post )
        <div class="list-group mt-3 mb-3">
            <div class="list-group-item">
                <a href="{{ route('posts.show', $post->id) }}"><h3>{{ $post->name }}</h3></a>
                @if($post->photo)
                    <div>
                        <img width="200px" src="{{url('/images/'.$post->photo)}}" alt="">
                    </div>
                @endif
            </div>
            <div class="list-group-item">
                <article>
                    {!! Str::limit($post->description, $limit = 1500, $end = '....... <a href='.url("/".$post->id).'>Read More</a>') !!}
                    <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} </p>
                </article>
            </div>
        </div>
    @endforeach
</div>
