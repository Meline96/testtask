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
                        </div>
                    </div>
                    <div class="list-group-item">
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
