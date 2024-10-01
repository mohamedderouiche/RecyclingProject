@extends('reclamations.layoutFront')


@section('content')

<div class="container mt-5">
    <h1>My Reclamations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->typeReclamation->name ?? 'N/A' }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>{{ optional($reclamation->statusReclamation)->status_reclamation ?? 'En Attente' }}</td>
                    <td>{{ $reclamation->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        @if($reclamation->image)
                            <img src="{{ asset('storage/' . $reclamation->image) }}" alt="Image" style="width: 100px; height: auto;">
                        @else
                            No Image
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
