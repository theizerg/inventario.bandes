<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Estados;
use App\Http\Requests\StoreMarca;

class MarcaController extends Controller
{
   
	public function __construct()
    {
        $this->middleware('permission:RegistrarMarca')->only('store');
        $this->middleware('permission:EditarMarca')->only('update');
        $this->middleware('permission:EliminarMarca')->only('destroy');
        $this->middleware('ajax', ['only' => ['store', 'update', 'destroy']]);
    }


    function index()
    {
    	$marcas = Marca::get();
    	//dd($marcas);
    	return view('admin.marcas.index', compact('marcas'));
    }


     function nuevo()
    {
    	$marcas = Marca::get();
    	$estados = Estados::get();
    	//dd($estados);
    	return view('admin.marcas.create', compact('marcas','estados'));
    }

    function guardar(StoreMarca $request)
    {
    	$marca = new Marca();
    	$marca->nb_nombre = $request->nb_nombre;
    	$marca->estado_id = $request->estado_id;

    	$marca->save();

        return json_encode(['success' => true, 'user_id' => $marca->encode_id]);
    }


    function editar($id)
    {
    	$marca = Marca::find(\Hashids::decode($id)[0]);
    	$estados = Estados::get();
    	//dd($estados);
    	return view('admin.marcas.edit', compact('marca','estados'));
    }

    function update(StoreMarca $request , $id)
    {
    	$marca = Marca::find(\Hashids::decode($id)[0]);
    	$marca->nb_nombre = $request->nb_nombre;
    	$marca->estado_id = $request->estado_id;

    	$marca->save();

        return json_encode(['success' => true, 'user_id' => $marca->encode_id]);
    }


}
