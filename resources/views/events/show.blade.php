@extends('events.layout')

@section('content')
    <h1>{{ $event->title }}</h1>

    <p>{{ $event->description }}</p>
    <p><img src="{{ $event->image }}" alt="{{ $event->title }}" /></p>
    <p>Type Event: {{ $event->typeEvent->title ?? 'N/A' }}</p>

    <a href="{{ route('events.edit', $event->id) }}">Edit</a>
    <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are you sure you want to delete this event?');">Delete</button>
    </form>

    <a href="{{ route('events.index') }}">Back to List</a>
@endsection
