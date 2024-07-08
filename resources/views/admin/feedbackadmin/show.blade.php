@extends('admin.main-layout')

@section('body')
    <div class="container mt-5">
        <h1>Feedback {{ $feedback->id }}</h1>
        <div class="card">
            <div class="card-body">
                <h5>Type: {{ $feedback->type }}</h5>
                <p>Message: {{ $feedback->message }}</p>
                <p>Status: {{ $feedback->status }}</p>
                <p>Response: {{ $feedback->response }}</p>
            </div>
        </div>
        <a href="{{ route('admin.feedbackadmin.index') }}" class="btn btn-secondary">Back to Feedback List</a>
    </div>
@endsection