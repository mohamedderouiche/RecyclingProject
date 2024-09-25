


{{-- ********************************************* --}}
    <h1>Type Events List</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    {{-- Button to create a new Type Event --}}
    <div>
        <a href="{{ route('type_events.create') }}">Create New Type Event</a>
    </div>

    {{-- Display the list of TypeEvents --}}
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typeEvents as $typeEvent)
                <tr>
                    <td>{{ $typeEvent->id }}</td>
                    <td>{{ $typeEvent->title }}</td>
                    <td>{{ $typeEvent->description }}</td>
                    <td>
                        @if($typeEvent->image)
                            <img src="{{ asset('storage/' . $typeEvent->image) }}"alt="Event Image" style="width:100px;height:100px;">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        {{-- Get by ID (View) Button --}}
                        <a href="{{ route('type_events.show', $typeEvent->id) }}">
                            <button>detail</button>
                        </a>

                        {{-- Update (Edit) Button --}}
                        <a href="{{ route('type_events.edit', $typeEvent->id) }}">
                            <button>Update</button>
                        </a>

                        {{-- Delete Form --}}
                        <form action="{{ route('type_events.destroy', $typeEvent->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/">Back to Home</a>

