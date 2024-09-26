@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Ticket</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Subject:</label>
                <input type="text" name="sub" id="sub" class="form-control" value="{{ old('sub') }}" required>
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" class="form-control" rows="5" required>{{ old('desc') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
@endsection
