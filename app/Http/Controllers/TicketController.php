<?php

namespace App\Http\Controllers;

use App\Mail\SendTicketMailClose;
use App\Mail\SendTicketMailOpen;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        // List all tickets
        $tickets = Ticket::where('user_id', auth()->id())->get();
        return view('tickets.customer.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        // Show form to create a new ticket
        return view('tickets.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // Store a new ticket
        $request->validate([
            'sub' => 'required|string|max:255',
            'desc' => 'required',
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'sub' => $request->sub,
            'desc' => $request->desc,
            'status' => 'open',
        ]);

        // Send email notification to admin (you need to configure mail)
        Mail::to(auth()->user()->email)->send(new SendTicketMailOpen($request->sub, $request->desc));

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket){
        // View a specific ticket
        return view('tickets.customer.show', compact('ticket'));
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
}
