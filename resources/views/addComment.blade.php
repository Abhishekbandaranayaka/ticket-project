<!-- resources/views/addComment.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Comment</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form id="addCommentForm" action="{{ route('ticket.addComment') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ticket_id">Ticket ID:</label>
            <input type="text" class="form-control" id="ticket_id" name="ticket_id" required>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('#addCommentForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the form from submitting normally

            // Send an Ajax request to the server
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(), // Serialize the form data
                success: function (response) {
                    // Handle the successful response
                    alert('Comment added successfully.');
                    window.location.href = '{{ route('ticket.index') }}'; // Redirect to the ticket index page
                },
                error: function (xhr, status, error) {
                    // Handle the error
                    alert('An error occurred while adding the comment.');
                }
            });
        });
    });
</script>
@endsection
