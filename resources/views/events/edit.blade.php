@extends('events.layout')

@section('content')
    <h1>Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div>
            <label for="image">Image URL</label>
            <input type="text" id="image" name="image" value="{{ old('image', $event->image) }}">
        </div>

        <div>
            <label for="type_events_id">Type Event</label>
            <select id="type_events_id" name="type_events_id" required>
                @foreach ($typeEvents as $typeEvent)
                    <option value="{{ $typeEvent->id }}" {{ $event->type_events_id == $typeEvent->id ? 'selected' : '' }}>
                        {{ $typeEvent->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('events.index') }}">Back to List</a>
@endsection
