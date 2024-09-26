@extends('layouts.app')

@section('content')
    <div class="container">
        <p>A new ticket has been opened:</p>
        <p><strong>Ticket ID:</strong> {{ $ticket->id }}</p>
        <p><strong>Description:</strong> {{ $ticket->desc }}</p>
        <p><strong>Opened:</strong> {{ $ticket->created_at->diffForHumans() }}</p>
    </div>
@endsection
