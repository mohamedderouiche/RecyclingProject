@extends('categories.layout')

@section('content')
<div class="container">
    <h1 class="my-4">Category Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }}</h5>
            <p class="card-text">{{ $category->description }}</p>
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
