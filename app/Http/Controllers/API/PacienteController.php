<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SavePacientesRequest;
use App\Http\Requests\UpdatePacientesRequest;
use App\Http\Resources\PacienteResource;
use App\Models\Pacientes;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PacienteResource::collection(Pacientes::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePacientesRequest $request)
    {
       /* Pacientes::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Paciente guardado con exito'
        ],201); */

        return (new PacienteResource(Pacientes::create($request->all())))->additional(['msg' => 'Paciente guardado con exito']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pacientes $paciente)
    {
        /* return response()->json([
            'res' => true,
            'paciente' => $paciente
        ],200); */

        return new PacienteResource($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePacientesRequest $request, Pacientes $paciente)
    {
        $paciente->update($request->all());

        /* return response()->json([
            'res' => true,
            'msg' => 'Paciente actualizado con exito'
        ],200); */

        return (new PacienteResource($paciente))->additional(['msg' => 'Paciente actualizado con exito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pacientes $paciente)
    {
        $paciente->delete();

        /* return response()->json([
            'res' => true,
            'msg' => 'Paciente eliminado'
        ],200); */

        return (new PacienteResource($paciente))->additional(['msg' => 'Paciente eliminado']);
    }
}
