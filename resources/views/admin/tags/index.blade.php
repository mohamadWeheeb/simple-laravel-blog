@extends('layouts.admin')

@section('title' , 'Tags')
@section('content')

<a class="btn btn-primary" href="{{ route('tags.create') }}">Add New Tag</a>

<div class="table-responsive">
    <table class="table-striped table-sm table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tag Name</th>
                <th scope="col">Number Of Articles</th>
                <th scope="col">Created At</th>
                <th scope="col">Control</th>
            </tr>
        </thead>
        <tbody>
            @php $i=0; @endphp
            @forelse ($tags as $tag)
                <tr>
                    <td>{{ ++ $i }}</td>
                    <td>{{ $tag->tag }}</td>
                    <td>{{ $tag->articles_count }}</td>
                    <td>{{ $tag->created_at }}</td>

                    <td>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <a class="btn btn-dark" href="{{ route('tags.show' , $tag->id) }}">Show</a>
                                </div>
                                <div class="col-sm">
                                    <a class="btn btn-info" href="{{ route('tags.edit' , $tag->id) }}">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('tags.destroy' , $tag->id) }}" method="post">
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
</div>

@endsection
