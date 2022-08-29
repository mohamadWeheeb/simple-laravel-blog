@extends('layouts.admin')

@section('title', 'Create New Article')
@section('content')


    @if(session('errorMessage'))
    <div class="alert alert-danger">

        <p class="text-danger">{{ session('errorMessage') }}</p>

    </div>
    @endif
	<form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Article Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Article Title" required value="{{ old('title') }}">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Article Body</label>
            <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3" required>{{ old('body') }}</textarea>

            @error('body')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Article Image</label>
            <input class="form-control" type="file" name="image" id="image">
            @error('image')
            <p class="text-danger">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Article Category</label>
            <select class="form-control"  name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message  }}</p>
            @enderror

        </div>


        <div class="mb-3">
            <label for="tags" class="form-label">Article Tags</label>
            <input class="form-control" type="text" name="tags" id="tags" value="{{ old('tags') }}">
            <h5 class="text-info">spreted by ' , '</h5>
            @error('tags')
            <p class="text-danger">{{ $message  }}</p>
            @enderror

        </div>
        <div class="mb-3">
            <button class="btn btn-primary"  type="submit">Publish</button>
        </div>
    </form>

@endsection
