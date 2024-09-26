@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ticket #{{ $ticket->id }}</h1>

        <div class="card mb-3">
            <div class="card-header">
                Ticket Information
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Subject</th>
                            <td>{{ $ticket->sub }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{ $ticket->desc }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $ticket->status }}</td>
                        </tr>
                        <tr>
                            <th>Opened</th>
                            <td>{{ $ticket->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if ($ticket->status === 'open')
            <form action="{{ route('admin.respond', $ticket) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="message">Respond to this ticket:</label>
                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-3">Submit</button>
            </form>

            <form action="{{ route('admin.close', $ticket) }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">Close</button>
            </form>
        @else
            <p class="text-success">This ticket has been closed.</p>
        @endif

        <a href="{{ route('admin.index') }}" class="btn btn-secondary mt-3">Back to All Tickets</a>
    </div>
@endsection
