@extends('layouts.admin')

@section('title' , 'Categories')
@section('content')

@if (session('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div>
@endif

<a class="btn btn-primary" href="{{ route('categories.create') }}">Add New Category</a>



<form action="" method="get">
    <div class="d-flex justify-content-around">
            <input type="text"  name="name" id="" class="form-control md-3" placeholder="Category Name" value="{{ old('name') }}">
            <button type="submit" class="btn btn-primary">Find</button>
    </div>
    </form>


<div class="table-responsive">
    <table class="table-striped table-sm table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Articles Count</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>
            @php $i=0; @endphp
            @forelse ($categories as $category)
                <tr>
                    <td>{{ ++ $i }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->articles_count }}</td>

                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <a class="btn btn-dark" href="{{ route('categories.show' , $category->id) }}">Show</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-info" href="{{ route('categories.edit' , $category->id) }}">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('categories.destroy' , $category->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <td colspan="5">
                    <h3 class="text-danger">No Data Yet</h3>
                </td>
            @endforelse

        </tbody>
    </table>

    {{ $categories->withqueryString()->links() }}
</div>

@endsection
