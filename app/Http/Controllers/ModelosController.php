<?php

namespace App\Http\Controllers;

use App\Models\Modelos;
use App\Models\TipoEquipos;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarca;

class ModelosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('permission:RegistrarModelo')->only('store');
        $this->middleware('permission:EditarModelo')->only('update');
        $this->middleware('permission:EliminarModelo')->only('destroy');
        $this->middleware('ajax', ['only' => ['store', 'update', 'destroy']]);
    }

   function index()
    {
        $marcas = Modelos::get();
        //dd($marcas);
        return view('admin.modelos.index', compact('marcas'));
    }


     function create()
    {
        $marcas = Modelos::get();
        $tipoE  = TipoEquipos::get();
        //$estados = Estados::get();
        //dd($estados);
        return view('admin.modelos.create', compact('marcas','tipoE'));
    }

    function store(StoreMarca $request)
    {
        $marca = new Modelos();
        $marca->nb_nombre = $request->nb_nombre;
        $marca->estado_id = $request->estado_id;

        $marca->save();

        return json_encode(['success' => true, 'user_id' => $marca->encode_id]);
    }


    function edit($id)
    {
        $marca = Modelos::find(\Hashids::decode($id)[0]);
        //}$estados = Estados::get();
        //dd($estados);
        return view('admin.modelos.edit', compact('marca'));
    }

    function update(StoreMarca $request , $id)
    {
        $marca = Modelos::find(\Hashids::decode($id)[0]);
        //dd($marca);
        $marca->nb_nombre = $request->nb_nombre;
        $marca->estado_id = $request->estado_id;

        $marca->save();

        return json_encode(['success' => true, 'user_id' => $marca->encode_id]);
    }

}
