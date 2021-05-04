@extends('layouts.admin')

@section('title', 'Permisos')
@section('page_title', 'Permisos')
@section('page_subtitle', 'Listado')

@section('breadcrumb')
    @parent
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ url('user') }}">usuarios</a></li>
    <li class="active">permisos</li>
@endsection

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="font-weight-bold">Permisos del rol usuario</h2>
                <div class="card-tools"></div>
              </div>
              <div class="card-body ">
                <form role="form" id="main-form">
                  <input type="hidden" id="_url" value="{{ url('permission', ['user']) }}">
                  <input type="hidden" id="_token" value="{{ csrf_token() }}">
                  <table class="table table-responsive table-striped">
                                   
                    <tr>
                      <td>
                        Ver usuarios<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerUsuario" {{ $role->hasPermissionTo('VerUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarUsuario" {{ $role->hasPermissionTo('RegistrarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Editar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarUsuario" {{ $role->hasPermissionTo('EditarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar usuarios</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarUsuario" {{ $role->hasPermissionTo('EliminarUsuario') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Ver Roles<br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerRole" {{ $role->hasPermissionTo('VerRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Agregar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarRole" {{ $role->hasPermissionTo('RegistrarRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Editar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarRole" {{ $role->hasPermissionTo('EditarRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Eliminar Roles</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarRole" {{ $role->hasPermissionTo('EliminarRole') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Ver Equipo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerEquipo" {{ $role->hasPermissionTo('VerEquipo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      <td>
                        Crear Equipo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="RegistrarEquipo" {{ $role->hasPermissionTo('RegistrarEquipo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                     
                       <td>
                        Ver logins</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="VerLogins" {{ $role->hasPermissionTo('VerLogins') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                       <td>
                        Editar Equipo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EditarEquipo" {{ $role->hasPermissionTo('EditarEquipo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                    </tr>
                   <tr>
                     <td>
                        Eliminar Equipo</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="EliminarEquipo" {{ $role->hasPermissionTo('EliminarEquipo') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                      
                      <td>
                        Asignar permisos</br>
                        <div class="checkbox icheck">
                          <label>
                            <input type="checkbox" name="permissions[]" value="AsignarPermisos" {{ $role->hasPermissionTo('AsignarPermisos') ? 'checked' : '' }}>
                          </label>
                        </div>
                      </td>
                   </tr>
                  </table>
                  <div class="box-footer clearfix"></div>
                   <div class="form-group pading">
                     <label for="name">Contraseña actual</label>
                     <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Contraseña actual">
                     <span class="missing_alert text-danger" id="current_password_alert"></span>
                    </div>
                    <button type="submit" class="btn btn-primary ajax" id="submit">
                      <i id="ajax-icon" class="fa fa-edit"></i> Editar
                    </button>
                  </div>
                </form>
            </div>
          </div>
              
      </div>
    </section>


@endsection

@push('scripts')
 <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
 </script>
  <script src="{{ asset('js/admin/permission/index.js') }}"></script>
@endpush
