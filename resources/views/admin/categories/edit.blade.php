@extends('layouts.admin')

@section('title', 'Edit Category')
@section('content')


    @if(session('erroeMessage'))
    <div class="alert alert-danger">

        <p class="text-danger">{{ session('erroeMessage') }}</p>

    </div>
    @endif
	<form action="{{ route('categories.update' , $category->id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Category Name" required value="{{ old('name' , $category->name) }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-primary"  type="submit">Update</button>
        </div>
    </form>

@endsection
