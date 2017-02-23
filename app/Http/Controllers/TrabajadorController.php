<?php

namespace CrudTrabajador\Http\Controllers;

use CrudTrabajador\Cargo;
use CrudTrabajador\Trabajador;
use Illuminate\Http\Request;

use CrudTrabajador\Http\Requests;
use Illuminate\Routing\Route;

class TrabajadorController extends Controller
{

    public function __construct()
    {
        $this->middleware('cors');
        $this->middleware('find',['only'=>[]]);
    }

    public function find(Route $route)
    {
        $this->trabajador = Trabajador::find($route->getParameter('$trabajadores'));
    }

    public function index()
    {
        $trabajadores = Trabajador::all();
        return  response()->json($trabajadores->toArray());    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Trabajador::create($request->all());
        return response()->json(["mensaje"=>"Trabajador Registrado"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->trabajador = Trabajador::find($id);
        return response()->json($this->trabajador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $trabajador = Trabajador::find($id);
        if (!$trabajador) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra el Trabajador.'])], 404);
        }
        $data = $request->input();
        $trabajador->update($data);
        return response()->json(["mensaje"=>"Registro Actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajador = trabajador::find($id);
        if (!$trabajador) {
            return response()->json(['errors' => array(['code' => 404, 'message' => 'No se encuentra el trabajador.'])], 404);
        }
        $trabajador->delete();
        return response()->json(["mensaje"=>"Trabajador Eliminado"]);
    }


   /* public function BuscarCargos()
    {
        $cargos = Cargo::all();
        return  response()->json($cargos->toArray());
    }*/
}
