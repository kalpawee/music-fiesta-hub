@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="container">
        <h1>Add Event</h1>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Event Name:</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="date">Date and Time:</label>
                <input type="datetime-local" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" name="venue" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured_band">Featured Band:</label>
                <input type="text" name="featured_band" class="form-control">
            </div>
            <div class="form-group">
                <label for="ticket_price">Ticket Price:</label>
                <input type="text" name="ticket_price" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>
@endsection


