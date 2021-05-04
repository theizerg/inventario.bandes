<?php

namespace App\Http\Controllers;

use App\Models\Gerencia;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarca;

class GerenciaController extends Controller
{
     public function __construct()
    {
        $this->middleware('permission:RegistrarGerencia')->only('store');
        $this->middleware('permission:EditarGerencia')->only('update');
        $this->middleware('permission:EliminarGerencia')->only('destroy');
        $this->middleware('ajax', ['only' => ['store', 'update', 'destroy']]);
    }

   function index()
    {
        $marcas = Gerencia::get();
        //dd($marcas);
        return view('admin.gerencia.index', compact('marcas'));
    }


     function create()
    {
        $marcas = Gerencia::get();
        //$estados = Estados::get();
        //dd($estados);
        return view('admin.gerencia.create', compact('marcas'));
    }

    function store(StoreMarca $request)
    {
        $marca = new Gerencia();
        $marca->nb_nombre = $request->nb_nombre;
        $marca->estado_id = $request->estado_id;

        $marca->save();

        return json_encode(['success' => true, 'user_id' => $marca->encode_id]);
    }


    function edit($id)
    {
        $marca = Gerencia::find(\Hashids::decode($id)[0]);
        //}$estados = Estados::get();
        //dd($estados);
        return view('admin.gerencia.edit', compact('marca'));
    }

    function update(StoreMarca $request , $id)
    {
        $marca = Gerencia::find(\Hashids::decode($id)[0]);
        //dd($marca);
        $marca->nb_nombre = $request->nb_nombre;
        $marca->estado_id = $request->estado_id;

        $marca->save();

        return json_encode(['success' => true, 'user_id' => $marca->encode_id]);
    }
}
