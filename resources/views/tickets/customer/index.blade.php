@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Your Tickets</h1>
            <a href="{{ route('customer.create') }}" class="btn btn-primary float-right btn-sm mb-2">New Ticket</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
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
    </div>
@endsection
