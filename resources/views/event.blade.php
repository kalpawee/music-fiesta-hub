@extends('layout')

@section('content')
    <div class="container" style="margin-top: 20px; max-width: 800px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary" style="margin-bottom: 20px;">Add Event</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Venue</th>
                <th>Featured Band</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->featured_band }}</td>
                    <td>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
