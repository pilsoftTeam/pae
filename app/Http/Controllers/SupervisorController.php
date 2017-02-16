<?php

namespace App\Http\Controllers;

use App\Asignaciones;
use App\Checklist;
use App\Resultados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupervisorController extends Controller
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

    public function getState()
    {
        $asignaciones = Asignaciones::with('getChecklistName', 'getBodegaInfo', 'getRevisor', 'getSuper')->get();

        return response()->json($asignaciones, 200);
    }

    public function getAsignacion($id)
    {
        $resultados = Resultados::where('idAsignacion', $id)->with('getEvaluaciones')->get();

        return response()->json($resultados, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $asignacion = new Asignaciones();
        $asignacion->idChecklist = $request->idChecklist;
        $asignacion->idDesignador = Auth::user()->id;
        $asignacion->idRevisor = $request->idRevisor;
        $asignacion->idBodega = $request->idBodega;
        $asignacion->estado = 'asignado';
        $asignacion->save();


        return response()->json(200);
    }

    public function getChecklist($id)
    {
        $checklist = Checklist::where('id', $id)->with('getItemsWithRespuestas')->get();

        return response()->json($checklist, 200);
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
        //
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
        //
    }
}
