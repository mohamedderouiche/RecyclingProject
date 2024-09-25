@extends('type_events.layout')
@section('content')
    <h1>Create New Type Event</h1>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire pour créer un nouveau TypeEvent --}}
    <form action="{{ route('type_events.store') }}" method="POST" enctype="multipart/form-data">
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
            <button type="submit">Create</button>
        </div>
    </form>

    <a href="{{ route('type_events.index') }}">Back to List</a>
@endsection
