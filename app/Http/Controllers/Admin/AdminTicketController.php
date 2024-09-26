<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SendTicketMailClose;
use App\Models\Ticket;
use App\Models\TicketVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // List all tickets
        $tickets = Ticket::with('user')->latest()->get();
        return view('tickets.admin.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket){
        // View a specific ticket
        return view('tickets.admin.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Admin responds to a ticket
    public function ticketVerified(Request $request, Ticket $ticket) {
        // Admin responds to a ticket
        $request->validate([
            'message' => 'required',
        ]);

        TicketVerify::create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);

        // close the ticket
        if ($request->status == 'closed') {
            $ticket->update(['status' => 'closed']);
        }
        return back();
    }

    // Respond to a ticket as an admin
    public function respond(Request $request, Ticket $ticket){
        // Validate the response form
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        // add TicketVerify
        TicketVerify::create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'message' => $request->message,
        ]);
        return redirect()->route('admin.index')->with('success', 'Response added successfully!');
    }

    // Close a ticket as an admin
    public function close(Ticket $ticket){
        // Update the ticket status to 'closed'
        $ticket->update(['status' => 'closed']);

        // Send an email notification to the customer
        Mail::to($ticket->user->email)->send(new SendTicketMailClose($ticket));

        return redirect()->route('admin.index')->with('success', 'Ticket closed successfully!');
    }
}
