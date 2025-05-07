<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tickets = Ticket::with(['equipment', 'equipment.office', 'user', 'technician']);

        // Filtros opcionales
        if ($request->has('status')) {
            $tickets->where('status', $request->status);
        }
        if ($request->has('priority')) {
            $tickets->where('priority', $request->priority);
        }
        if ($request->has('service_type')) {
            $tickets->where('service_type', $request->service_type);
        }

        return response()->json(['data' => $tickets->get()], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 'open';

        $ticket = Ticket::create($validatedData);
        return response()->json(['data' => $ticket], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::with(['equipment', 'equipment.office', 'user', 'technician'])->find($id);
        
        if (!$ticket) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }

        return response()->json(['data' => $ticket], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }

        $validatedData = $request->validated();
        
        // Si el ticket se marca como resuelto, establecer la fecha de resolución
        if (isset($validatedData['status']) && $validatedData['status'] === 'resolved') {
            $validatedData['resolved_at'] = now();
        }

        $ticket->update($validatedData);
        return response()->json(['data' => $ticket], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }

        $ticket->delete();
        return response()->json(['message' => 'Ticket eliminado correctamente'], 200);
    }

    /**
     * Asignar un técnico al ticket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }

        $request->validate([
            'technician_id' => 'required|exists:users,id'
        ]);

        $ticket->assigned_to = $request->technician_id;
        $ticket->status = 'in_progress';
        $ticket->save();

        return response()->json(['data' => $ticket], 200);
    }

    /**
     * Marcar un ticket como resuelto.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resolve(Request $request, $id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            return response()->json(['message' => 'Ticket no encontrado'], 404);
        }

        $request->validate([
            'resolution_notes' => 'required|string'
        ]);

        $ticket->resolution_notes = $request->resolution_notes;
        $ticket->status = 'resolved';
        $ticket->resolved_at = now();
        $ticket->save();

        return response()->json(['data' => $ticket], 200);
    }
}
