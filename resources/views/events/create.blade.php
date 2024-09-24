@extends('events.layout')

@section('content')
    <h1>Create New Event</h1>

    <form action="{{ route('events.store') }}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

    
        <div >
            <label for="image">Image </label>
       
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required  />

        <div>

        <div>
            <label for="type_events_id">Type Event</label>
            <select id="type_events_id" name="type_events_id" required>
                @foreach ($typeEvents as $typeEvent)
                    <option value="{{ $typeEvent->id }}">{{ $typeEvent->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create</button>
    </form>

    <a href="{{ route('events.index') }}">Back to List</a>
@endsection
