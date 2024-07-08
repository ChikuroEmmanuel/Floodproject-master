@extends('admin.main-layout')

@section('body')
    <div class="container mt-5">
        <h1>Feedback Management</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->id }}</td>
                        <td>{{ $feedback->type }}</td>
                        <td>{{ Str::limit($feedback->message, 50) }}</td>
                        <td>{{ $feedback->status }}</td>
                        <td>
                            <a href="{{ route('admin.feedbackadmin.show', $feedback) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.feedbackadmin.edit', $feedback) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('delete', $feedback) }}" method="post" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $feedbacks->links() }}
    </div>
    </body>

@endsection

