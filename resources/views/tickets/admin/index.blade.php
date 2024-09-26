@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Tickets</h1>

        @if($tickets->isEmpty())
            <p>No tickets have been created yet.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
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
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->sub }}</td>
                        <td>{{ $ticket->desc }}</td>
                        <td>{{ ucfirst($ticket->status) }}</td>
                        <td>
                            <a href="{{ route('admin.show', $ticket) }}" class="btn btn-info">View</a>
                            @if ($ticket->status === 'open')
                                <form action="{{ route('admin.close', $ticket) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Close</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
