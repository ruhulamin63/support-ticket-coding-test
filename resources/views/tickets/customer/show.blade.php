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
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{ $ticket->sub }}</td>
                            <td>{{ $ticket->desc }}</td>
                            <td>{{ ucfirst($ticket->status) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('customer.index') }}" class="btn btn-secondary">Back to Tickets</a>
    </div>
@endsection
