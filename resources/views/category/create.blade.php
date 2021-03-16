@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('categories.store') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input value="{{ old('title') }}" placeholder="Enter title here" type="text" name="title" class="form-control" />
                    </div>
                    @if($categories->isNotEmpty())
                        <div class="form-group">
                            <select class="form-control" name="parent_id" id="">
                                <option value="">Not selected</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
                </form>
            </div>
        </div>
    </div>
@endsection
