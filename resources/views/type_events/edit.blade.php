@extends('type_events.layout')

@section('content')
    <h1>Edit Type Event</h1>

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form for editing a TypeEvent --}}
    <form action="{{ route('type_events.update', $typeEvent->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Use PUT or PATCH for updating resources --}}

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $typeEvent->title) }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $typeEvent->description) }}</textarea>
        </div>

        <div>
            <label for="image">Image URL</label>
            <input type="text" id="image" name="image" value="{{ old('image', $typeEvent->image) }}">
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>

    <a href="{{ route('type_events.index') }}">Back to List</a>
@endsection
