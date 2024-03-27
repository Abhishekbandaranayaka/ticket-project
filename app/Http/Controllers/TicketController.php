<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ticket;


class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticketIndex', ['tickets' => $tickets]);
    }

    public function addComment(Request $request)
{
    // Validate the request data
    $request->validate([
        'ticket_id' => 'required|exists:tickets,id',
        'comment' => 'required|string',
    ]);

    // Logic to add comment to ticket
    $ticket = Ticket::find($request->ticket_id);
    if (!$ticket) {
        return back()->withErrors(['message' => 'Ticket not found.']);
    }

    $ticket->comments()->create([
        'comment' => $request->comment,
    ]);

    return redirect()->route('ticket.index')->with('success', 'Comment added successfully.');
}
    public function showAddCommentForm()
    {
        return view('addComment');
    }
}
