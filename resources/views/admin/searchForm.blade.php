<form action="" method="get">
<div class="d-flex justify-content-around">
        <input type="text"  name="title" id="" class="form-control md-3" placeholder="Article Title" value="{{ old('title') }}">
        <select name="category" id="" class="form-control ms-3">
            <option value="">All</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == old('category')) selected @endif>{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Fillter</button>
</div>
</form>
