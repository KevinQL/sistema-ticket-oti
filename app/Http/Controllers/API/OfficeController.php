<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::with('equipment')->get();
        return response()->json(['data' => $offices], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeRequest $request)
    {
        $office = Office::create($request->validated());
        return response()->json(['data' => $office], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office = Office::with('equipment')->find($id);
        
        if (!$office) {
            return response()->json(['message' => 'Oficina no encontrada'], 404);
        }

        return response()->json(['data' => $office], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeRequest $request, $id)
    {
        $office = Office::find($id);

        if (!$office) {
            return response()->json(['message' => 'Oficina no encontrada'], 404);
        }

        $office->update($request->validated());
        return response()->json(['data' => $office], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::find($id);

        if (!$office) {
            return response()->json(['message' => 'Oficina no encontrada'], 404);
        }

        $office->delete();
        return response()->json(['message' => 'Oficina eliminada correctamente'], 200);
    }
}
