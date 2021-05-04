<?php

namespace App\Http\Controllers;

use App\Models\Asignados;
use App\Models\Equipos;
use App\Models\EquiposConsumibles;
use Illuminate\Http\Request;
use App\Http\Requests\AsignacionRequest;

class AsignadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignados = Asignados::get();

        return view ('admin.asignar.index', compact('asignados'));
    }

    public function consumibles()
    {
        $asignados = Asignados::get();
         $consumibles = EquiposConsumibles::get();
        return view ('admin.asignar.consumibles', compact('consumibles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $equipos = Equipos::get();
        $consumibles = EquiposConsumibles::get();

        return view ('admin.asignar.create', compact('equipos','consumibles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->tipo_de_asignacion == 'equipos') {
            
        $equipo = Equipos::find($request->equipo_id);
        $cantidad = 0;

         $validatedData = $request->validate([
            'serial_bandes'         => 'required',
            'descripcion'         => 'required',
            'equipo_id'         => 'required',
            'nb_funcionario'         => 'required',
            'nb_gerencia'         => 'required',
            'nb_unidad_administrativa'         => 'required',
            'nu_piso'         => 'required',
            'nu_extension'         => 'required',
            'status'         => 'required',
            'nb_especialista_soporte'         => 'required',

         ]);

         if($equipo->nu_cantidad >= $request->nu_cantidad){
            
           $cantidad = $equipo->nu_cantidad - $request->nu_cantidad;

            $equipo->nu_cantidad = $cantidad;

            $equipo->save();



            $asignacion = new Asignados();

            $asignacion->fecha                    = date('d/m/Y');
            $asignacion->serial_bandes            = $request->serial_bandes;
            $asignacion->descripcion              = $request->descripcion;
            $asignacion->equipo_id                = $request->equipo_id;
            $asignacion->nb_funcionario           = $request->nb_funcionario;
            $asignacion->nb_gerencia              = $request->nb_gerencia;
            $asignacion->nb_unidad_administrativa = $request->nb_unidad_administrativa;
            $asignacion->nu_piso                  = $request->nu_piso;
            $asignacion->nu_extension             = $request->nu_extension;
            $asignacion->status                   = $request->status;
            $asignacion->nb_especialista_soporte  = $request->nb_especialista_soporte;
            $asignacion->nu_cantidad              = $request->nu_cantidad;
            $asignacion->nu_tipo_asignado       = 1;
            $asignacion->save();

        return json_encode(['success' => true, 'user_id' => $asignacion->encode_id]);

         } else {
        
            return response()->json(['error' => 'La cantidad de equipos a asignar supera la cantidad disponible de equipos. '], 500);



         }

        } else {
            
             $validatedData = $request->validate([
            'serial_bandes'         => 'required',
            'descripcion'         => 'required',
            'equipo_id'         => 'required',
            'nb_funcionario'         => 'required',
            'nb_gerencia'         => 'required',
            'nb_unidad_administrativa'         => 'required',
            'nu_piso'         => 'required',
            'nu_extension'         => 'required',
            'status'         => 'required',
            'nb_especialista_soporte'         => 'required',

         ]);

            $equipo = EquiposConsumibles::find($request->equipo_id);

        $cantidad = 0;

          if($equipo->nu_cantidad >= $request->nu_cantidad){
            
           $cantidad = $equipo->nu_cantidad - $request->nu_cantidad;

            $equipo->nu_cantidad = $cantidad;

            $equipo->save();



             $asignacion = new Asignados();

            $asignacion->fecha                    = date('d/m/Y');
            $asignacion->serial_bandes            = $request->serial_bandes;
            $asignacion->descripcion              = $request->descripcion;
            $asignacion->equipo_id                = $request->equipo_id;
            $asignacion->nb_funcionario           = $request->nb_funcionario;
            $asignacion->nb_gerencia              = $request->nb_gerencia;
            $asignacion->nb_unidad_administrativa = $request->nb_unidad_administrativa;
            $asignacion->nu_piso                  = $request->nu_piso;
            $asignacion->nu_extension             = $request->nu_extension;
            $asignacion->status                   = $request->status;
            $asignacion->nb_especialista_soporte  = $request->nb_especialista_soporte;
            $asignacion->nu_cantidad              = $request->nu_cantidad;
            $asignacion->nu_tipo_asignado         = 2;
            $asignacion->save();

        return json_encode(['success' => true, 'user_id' => $asignacion->encode_id]);

         } else {
        
            return response()->json(['error' => 'La cantidad de equipos a asignar supera la cantidad disponible de equipos. '], 500);



         }


        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignados  $asignados
     * @return \Illuminate\Http\Response
     */
    public function show(Asignados $asignados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignados  $asignados
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignados $asignados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignados  $asignados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignados $asignados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignados  $asignados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignados $asignados)
    {
        //
    }
}
