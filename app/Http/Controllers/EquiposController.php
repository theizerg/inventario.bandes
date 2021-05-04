<?php

namespace App\Http\Controllers;

use App\Models\Equipos;
use App\Models\TipoEquipos;
use Illuminate\Http\Request;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $users = Equipos::get();
        return view ('admin.equipos.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = TipoEquipos::get();
        $equipos = Equipos::get();

        return view ('admin.equipos.create', compact('tipo', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new Equipos();
        
        $equipo->tipo_equipo_id = $request->tipo_equipo_id;
        $equipo->nb_marca = $request->nb_marca;
        $equipo->nb_modelo = $request->nb_modelo;
        $equipo->serial = $request->serial;
        $equipo->nu_cantidad = $request->nu_cantidad;
        $equipo->status = $request->status;
        $equipo->save();

        return json_encode(['success' => true, 'user_id' => $equipo->encode_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function show(Equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit($equipos_id)
    {
        
        $equipo = Equipos::find(\Hashids::decode($equipos_id)[0]);
        //dd($equipo);
        $tipos = TipoEquipos::get();

        return view ('admin.equipos.edit', compact('tipos', 'equipo'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $equipo = Equipos::find(\Hashids::decode($id)[0]);
        //dd($marca);
        $equipo->tipo_equipo_id = $request->tipo_equipo_id;
        $equipo->nb_marca = $request->nb_marca;
        $equipo->nb_modelo = $request->nb_modelo;
        $equipo->serial = $request->serial;
        $equipo->nu_cantidad = $request->nu_cantidad;
        $equipo->status = $request->status;
        $equipo->save();


        $equipo->save();

        return json_encode(['success' => true, 'user_id' => $equipo->encode_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipos $equipos)
    {
        //
    }
}
