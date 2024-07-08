@extends('admin.main-layout')

@section('body')
    <div class="container mt-5">
        <h1>Edit Feedback {{ $feedback->id }}</h1>
        <form action="{{ route('update', $feedback) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $feedback->type }}" readonly>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" class="form-control" readonly>{{ $feedback->message }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="pending" {{ $feedback->status == 'pending'? 'selected' : '' }}>Pending</option>
                    <option value="resolved" {{ $feedback->status == 'resolved'? 'selected' : '' }}>Resolved</option>
                    <option value="rejected" {{ $feedback->status == 'rejected'? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="form-group">
                <label for="response">Response:</label>
                <textarea name="response" id="response" class="form-control">{{ $feedback->response }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Feedback</button>
            <a href="{{ route('admin.feedbackadmin.index') }}" class="btn btn-secondary">Back to Feedback List</a>
        </form>
    </div>
@endsection