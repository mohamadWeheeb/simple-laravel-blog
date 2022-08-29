@extends('layouts.admin')

@section('title' , 'Articles')
@section('content')


@include('admin.searchForm')
<a class="btn btn-primary" href="{{ route('articles.create') }}">Add New Article</a>

<div class="table-responsive">
    <table class="table-striped table-sm table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created At</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>
            @php $i=0; @endphp
            @forelse ($articles as $article)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        <img src="{{$article->image_url}}" width="60" alt="">
                    </td>
                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <a class="btn btn-dark" href="{{ route('articles.show' , $article->id) }}">Show</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-info" href="{{ route('articles.edit' , $article->id) }}">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('articles.destroy' , $article->id) }}" method="post">
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

    {{ $articles->withQueryString()->links() }}
</div>

@endsection
