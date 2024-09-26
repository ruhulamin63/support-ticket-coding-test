@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Tickets</h1>
        <a href="{{ route('customer.create') }}" class="btn btn-primary float-right">New Ticket</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->sub }}</td>
                    <td>{{ $ticket->desc }}</td>
                    <td>{{ ucfirst($ticket->status) }}</td>
                    <td>
                        <a href="{{ route('customer.show', $ticket) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
