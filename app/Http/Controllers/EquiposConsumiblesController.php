<?php

namespace App\Http\Controllers;

use App\Models\EquiposConsumibles;
use Illuminate\Http\Request;

class EquiposConsumiblesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $users = EquiposConsumibles::get();
        return view ('admin.consumible.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $equipos = EquiposConsumibles::get();

        return view ('admin.consumible.create', compact( 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new EquiposConsumibles();
        
        $equipo->tipo_equipo_consumible = $request->tipo_equipo_consumible;
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
        
        $equipo = EquiposConsumibles::find(\Hashids::decode($equipos_id)[0]);
        //dd($equipo);
        //$tipos = TipoEquipos::get();

        return view ('admin.consumible.edit', compact('equipo'));


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
         $equipo = EquiposConsumibles::find(\Hashids::decode($id)[0]);
        //dd($marca);
        $equipo->tipo_equipo_consumible = $request->tipo_equipo_consumible;
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
