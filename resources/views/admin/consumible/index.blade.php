@extends('layouts.admin')
@section('title', 'Equipos')
@section('page_title', 'Equipos consumibles')



@section('content')

   
      <div class="container">
        <div class="col-md-6">
          <div class="btn-group">
           
           @can('RegistrarEquipo')
            <a href="{{ url('equipos/create') }}" class="btn  blue darken-3 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>  
           @endcan
          </div>
        </div>
      </div>
      <br>
      
        <div class="col-md-12">
          <div class="card">
            <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h5 class=" text-white">Listado de los equipos</h5>
             
            </div>
             <!-- /.card-header -->
                <div class="card-body table-responsive">
                     <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/user/create" class="link_ruta">
                        Nuevo
                      </a>
                    </li>
                  </ul><br>
                <table id="example" class="table table-striped " style="width:100%">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Opciones</th> 
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $equipo)
                    <tr class="row{{ $equipo->id }}">
                    <td>{{ $equipo->id }}</td>
                    <td>{{ $equipo->tipo_equipo_consumible }}</td>
                    <td>{{ $equipo->nb_marca }}</td>
                    <td>{{ $equipo->nb_modelo }}</td>
                    
                    <td>{{ $equipo->nu_cantidad  }}</td>
                    <td><span class="{{ $equipo->status }}">{{ $equipo->display_status }}</span></td>
                    <td>
                       
                       <a class="btn btn-round red darken-4" href="{{ url('consumibles', [$equipo->encode_id,'edit']) }}"><i class="mdi mdi-pencil-outline text-center" style="color: white;"></i> </a>
                     
                       
                    </td>
                    </tr>
                    @endforeach
                    </tr>
                    </tbody>                
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
   



@endsection
