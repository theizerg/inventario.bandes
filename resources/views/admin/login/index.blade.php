@extends('layouts.admin')

@section('title', 'Usuarios')
@section('page_title', 'Usuarios')



@section('content')
  <div class="col-md-12">
    <div class="card">
      <div class="card-header blue-gradient-dark text-white outline-primary ">
        <h3 class="text-white">Listado de inicio de sesión</h3>
       
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
               <th>Usuario</th>
              <th>Inicio</th>
              <th>Cierre</th>
              <th>IP</th>
              <th>Cliente</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($logins as $login)
              <tr class="row{{ $login->id }}">
              <td>{{ $login->id }}</td>
              <td>{{ $login->user->full_name }}</td>
              <td>{{ $login->login_at  }}</td>
              <td>{{ $login->logout_at }}</td>
              <td>{{ $login->ip_address }}</td>
              <td>{{ $login->user_agent }}</td>
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
