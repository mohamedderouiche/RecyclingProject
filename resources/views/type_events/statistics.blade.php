@extends('reclamations.layout')

@section('content')
<div class="container">
    <h1>Event Statistics by Type</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Event Type</th>
                <th>Total Events</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->title }}</td>
                    <td>{{ $statistic->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
