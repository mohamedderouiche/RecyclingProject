@extends('categories.layout')

@section('content')
<div class="container">
    <h1 class="my-4">Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 btn-sm">Create New Category</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm action-btn">
                                <i class="fas fa-eye fa-xs icon-spacing"></i> 
                            </a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm action-btn">
                                <i class="fas fa-edit fa-xs icon-spacing"></i> 
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm action-btn">
                                    <i class="fas fa-trash fa-xs icon-spacing"></i> 
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
