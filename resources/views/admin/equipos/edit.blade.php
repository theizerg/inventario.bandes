 @extends('layouts.admin')

@section('title', 'Equipos')
@section('page_title', 'Equipos')
@section('page_subtitle', 'Ingresar')
@section('content')

  <section class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('VerEquipo')
          <a href="{{ url('user') }}" class="btn blue darken-4 text-white "><i class="mdi mdi-sort-alphabetical-ascending"></i> Listado</a>
          @endcan
          @can('RegistrarEquipo')
          <a href="{{ url('user/create') }}" class="btn blue darken-4 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h5 class=" text-white">Registrar equipo</h5>
             
            </div>
          <div class="card-body">
            <ul class="list-inline">
               <li class="list-inline-item">
                  <a href="/" class="link_ruta">
                    Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                </li>
               <li class="list-inline-item">
                  <a href="/equipos" class="link_ruta">
                    Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                </li>
               <li class="list-inline-item">
                  
                    Nuevo equipo
                 </li>
             </ul><br>
          
          <form role="form" id="main-form" autocomplete="off">
            <input type="hidden" id="_url" value="{{ url('equipos', [$equipo->encode_id]) }}">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="card-body">
              <div class="form-group">
                  <label>Tipo de equipo</label>
                  <select class="form-control select2" style="width: 100%;" name="tipo_equipo_id">
                    <option selected="selected">Seleccionar</option>
                   @foreach($tipos as $tipo)
                 
                  <option value="{{$tipo->id}}">{{$tipo->nb_nombre  }} </option>
                  @endforeach
                  </select>
                </div>
              <div class="form-group">
                  <label>Marca:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="mdi mdi-google"></i></span>
                    </div>
                    <input class="form-control" value="{{$equipo->nb_marca}}" style="font-size: 15px;" id="nb_marca" name="nb_marca" placeholder="Ingrese la marca">

                  </div>
                  <!-- /.input group -->
                   <span class="missing_alert text-danger" id="nb_marca_alert"></span>
                </div>
                <!-- /.form group -->
               <div class="form-group">
                  <label>Modelo:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="mdi mdi-laptop"></i></span>
                    </div>
                    <input class="form-control" value="{{$equipo->nb_modelo}} " style="font-size: 15px;" id="nb_modelo" name="nb_modelo" placeholder="Ingrese el modelo">
                  </div>
                  <!-- /.input group -->
                   <span class="missing_alert text-danger" id="nb_modelo_alert"></span>
                </div>
                <!-- /.form group -->
              <div class="form-group">
                  <label>Serial:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                    </div>
                    <input type="text" class="form-control" value="{{$equipo->serial}} " name="serial" id="serial" placeholder="Serial del equipo existente">
                  </div>
                  <!-- /.input group -->
                  <span class="missing_alert text-danger" id="serial_alert"></span>
              </div>
                <!-- /.form group -->
               <div class="form-group">
                  <label>Cantidad:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="mdi mdi-numeric-0-box-multiple-outline"></i></span>
                    </div>
                    <input type="text-danger" class="form-control" value="{{$equipo->nu_cantidad}} " name="nu_cantidad" id="nu_cantidad" placeholder="Cantidad existente">
                  </div>
                  <!-- /.input group -->
                   <span class="missing_alert text-danger" id="nu_cantidad_alert"></span>
              </div>
                <!-- /.form group -->
              <div class="form-group">
                <label class="font-weight-bolder" for="status">Disponibilidad del equipo</label>
                <div class="checkbox icheck">
                  <label class="font-weight-bolder">
                    <input type="radio" name="status" value="1" checked> Existe&nbsp;&nbsp;
                    <input type="radio" name="status" value="2"> No existe
                  </label>
                </div>
              </div>
            </div>
              <div class="">
                <button type="submit" class="btn blue darken-4 text-white  ajax" id="submit">
                  <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                </button>
               
              </div>
            </form>
          </div>
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

         $('.select2').select2()
      });
    </script>
    <script src="{{ asset('js/admin/equipos/edit.js') }}"></script>
@endpush
