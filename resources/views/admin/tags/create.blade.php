@extends('layouts.admin')

@section('title', 'Create New Tag')
@section('content')


    @if(session('erroeMessage'))
    <div class="alert alert-danger">

        <p class="text-danger">{{ session('erroeMessage') }}</p>

    </div>
    @endif
	<form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tag Name</label>
            <input type="text" name="tag" class="form-control" id="exampleFormControlInput1" placeholder="Tag Name" required value="{{ old('name') }}">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="mb-3">
            <button class="btn btn-primary"  type="submit">Add</button>
        </div>
    </form>

@endsection
