<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::with(['office', 'tickets'])->get();
        return response()->json(['data' => $equipment], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentRequest $request)
    {
        $equipment = Equipment::create($request->validated());
        return response()->json(['data' => $equipment], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipment = Equipment::with(['office', 'tickets'])->find($id);
        
        if (!$equipment) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        return response()->json(['data' => $equipment], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, $id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        $equipment->update($request->validated());
        return response()->json(['data' => $equipment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipment = Equipment::find($id);

        if (!$equipment) {
            return response()->json(['message' => 'Equipo no encontrado'], 404);
        }

        $equipment->delete();
        return response()->json(['message' => 'Equipo eliminado correctamente'], 200);
    }
}
