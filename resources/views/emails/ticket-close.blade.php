@extends('layouts.app')

@section('content')
    <div class="container">
        <p>A ticket has been closed:</p>
        <p><strong>Ticket ID:</strong> {{ $ticket->id }}</p>
        <p><strong>Description:</strong> {{ $ticket->desc }}</p>
        <p><strong>Closed:</strong> {{ $ticket->updated_at->diffForHumans() }}</p>
    </div>
@endsection
