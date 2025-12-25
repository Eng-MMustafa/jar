<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportTicket;
use App\Models\Admin;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function index(Request $request)
    {
        $tickets = SupportTicket::with(['user', 'assignedTo'])
            ->when($request->search, function($query) use ($request) {
                $query->where('ticket_number', 'like', '%' . $request->search . '%')
                      ->orWhere('subject', 'like', '%' . $request->search . '%');
            })
            ->when($request->status, function($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->priority, function($query) use ($request) {
                $query->where('priority', $request->priority);
            })
            ->when($request->category, function($query) use ($request) {
                $query->where('category', $request->category);
            })
            ->latest()
            ->paginate(15);

        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(SupportTicket $ticket)
    {
        $ticket->load(['user', 'assignedTo', 'replies']);
        $admins = Admin::all();
        
        return view('admin.tickets.show', compact('ticket', 'admins'));
    }

    public function assign(Request $request, SupportTicket $ticket)
    {
        $request->validate([
            'assigned_to' => 'nullable|exists:admins,id',
        ]);

        $ticket->update([
            'assigned_to' => $request->assigned_to,
            'status' => 'in_progress',
        ]);

        return redirect()
            ->route('admin.tickets.show', $ticket)
            ->with('success', 'Ticket assigned successfully.');
    }

    public function updateStatus(Request $request, SupportTicket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,pending_customer,resolved,closed',
        ]);

        $ticket->update(['status' => $request->status]);

        if ($request->status === 'resolved') {
            $ticket->update(['resolved_at' => now()]);
        } elseif ($request->status === 'closed') {
            $ticket->update(['closed_at' => now()]);
        }

        return redirect()
            ->route('admin.tickets.show', $ticket)
            ->with('success', 'Ticket status updated successfully.');
    }

    public function reply(Request $request, SupportTicket $ticket)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $ticket->replies()->create([
            'message' => $request->message,
            'sender_type' => 'admin',
            'sender_id' => auth()->guard('admin')->id(),
        ]);

        $ticket->update(['status' => 'pending_customer']);

        return redirect()
            ->route('admin.tickets.show', $ticket)
            ->with('success', 'Reply sent successfully.');
    }

    public function destroy(SupportTicket $ticket)
    {
        $ticket->delete();
        
        return redirect()->route('admin.tickets.index')
            ->with('success', 'Ticket deleted successfully.');
    }
}
