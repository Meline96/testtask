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
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input required="required" value="{{ old('name') }}" placeholder="Enter title here" type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <textarea name='description'class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category_id[]" id="" multiple>
                            @if($categories->isNotEmpty())
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <input type="file" name="file" class="d-block mb-5">
                    <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
                </form>
            </div>
        </div>
    </div>
@endsection
