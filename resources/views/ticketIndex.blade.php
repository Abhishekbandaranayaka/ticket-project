<!-- resources/views/ticketIndex.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Tickets</h1>
    @foreach ($tickets as $ticket)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $ticket->title }}</h5>
            <p class="card-text">{{ $ticket->description }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $ticket->status }}</p>
            <a href="{{ route('ticket.showAddCommentForm', ['id' => $ticket->id]) }}" class="btn btn-primary">Add Comment</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
