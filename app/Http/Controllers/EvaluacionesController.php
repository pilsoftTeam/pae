<?php

namespace App\Http\Controllers;

use App\Etapas;
use App\Evaluaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvaluacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $evaluacion = new Evaluaciones();

        $evaluacion->nombreEvaluacion = $request->nombreEvaluacion;
        $evaluacion->idItem = $request->idItem;
        $evaluacion->idEtapa = $request->idAgrupacion;
        $evaluacion->idOpcionCumplimiento = $request->opcionCumplimiento;
        $evaluacion->tipo = $request->tipo;
        $evaluacion->criticidad = $request->criticidad;
        $evaluacion->documentosVerificadores = $request->documentosVerificadores;
        $evaluacion->aspectoEvaluativo = $request->aspectoEvaluativo;
        $evaluacion->observacionEscrita = $request->observacionEscrita;
        $evaluacion->observacionDocumental = $request->observacionDocumental;
        $evaluacion->replicacion = $request->replicacion;
        $evaluacion->save();


        return response()->json($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaluaciones = Evaluaciones::where('idItem', $id)
            ->where('idEtapa', '=', null)->get();
        return response()->json($evaluaciones, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    public function files(Request $request)
    {


        $idAgrupacion = Evaluaciones::where('id', $request->idPregunta)->value('idEtapa');
        $idItem = Evaluaciones::where('id', $request->idPregunta)->value('idEtapa');


        $ruta = $request->idBodega . '/' . $request->idChecklist . '/' . $idItem . '/' . $request->idPregunta;

        if ($idAgrupacion) {
            $ruta = $request->idBodega . '/' . $request->idChecklist . '/' . $idItem . '/' . $idAgrupacion . '/' . $request->idPregunta;
        }


        foreach ($request->documentos as $item) {
            $fileName = $item->getClientOriginalName();
            $item->storeAs($ruta, $fileName);
        }


        return response()->json(200);

    }
}
