 @extends('layouts.admin')

@section('title', 'Asignación')
@section('page_title', 'Equipos a ser asignados')
@section('page_subtitle', 'Ingresar')
@section('content')

  <section class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="btn-group">
          @can('VerAsignacion')
          <a href="{{ url('asignacion') }}" class="btn blue darken-4 text-white "><i class="mdi mdi-sort-alphabetical-ascending"></i> Listado</a>
          @endcan
          @can('RegistrarAsignacion')
          <a href="{{ url('asignacion/create') }}" class="btn blue darken-4 text-white "><i class="fa fa-plus-square"></i> Ingresar</a>
          @endcan
        </div> 
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header blue-gradient-dark text-white outline-primary ">
              <h5 class=" text-white">Registrar asignación</h5>
             
            </div>
             <div class="card-body">
                <ul class="list-inline">
                   <li class="list-inline-item">
                      <a href="/" class="link_ruta">
                        Inicio &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      <a href="/asignacion" class="link_ruta">
                        Listado &nbsp; &nbsp;<i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </a>
                    </li>
                   <li class="list-inline-item">
                      
                        Nueva asignación
                  </li>
                 </ul><br>
                        <form id="main-form" class="">
                          <input type="hidden" id="_url" value="{{ url('asignacion') }}">
                          <input type="hidden" id="_redirect" value="{{ url('/') }}">
                          <input type="hidden" id="_token" value="{{ csrf_token() }}">      

                       <div class="row">
                         <div class="col-sm-12">
                           <div class="form-group">
                             <label>Tipo de asignación</label>

                               <div class="input-group">
                                 <select id="select_tipo_cliente" class="form-control " name="tipo_de_asignacion">
                                  <option>Tipo de asignación</option>
                                  <option value="equipos">Equipos movibles</option>
                                 
                            </select>
                         </div>
                     </div>
                   </div>
                 </div>
                 <div class="row">
                     <div class="col-sm-4">
                       <div class="form-group form-equipos">
                         <label>Equipos</label>
                           <div class="input-group">
                            <select id="select_tipo_cliente" class="form-control select2" name="equipo_id">  
                            <option value="0">Seleccione</option>
                            @foreach($equipos as $equipo)
                              <option value="{{$equipo->id}}">{{$equipo->tipoequipo->nb_nombre}} | {{$equipo->nb_marca}} | {{$equipo->nb_modelo}} </option>
                              @endforeach
                            </select>
                         </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                       <div class="form-group form-equipos">
                          <label>Serial Bandes</label>

                         <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="mdi mdi-bootstrap"></i></span>
                          </div>
                            <input class="form-control" value="{{ old('nb_marca') }}" style="font-size: 15px;" id="serial_bandes" name="serial_bandes" placeholder="Ingrese el serial de Bandes">

                         </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="serial_bandes_alert"></span>
                        </div>
                       </div>
                       <div class="col-sm-4">
                       <div class="form-group form-equipos">
                          <label>Funcionario</label>

                         <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                          </div>
                            <input class="form-control" value="{{ old('nb_funcionario') }}" style="font-size: 15px;" id="nb_funcionario" name="nb_funcionario" placeholder="Ingrese el funcionario beneficiado">

                         </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nb_funcionario_alert"></span>
                        </div>
                       </div>
                       <div class="col-sm-4">
                          <div class="form-group form-equipos">
                          <label>Gerencia Ejecutiva</label>

                         <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                          </div>
                            <input class="form-control" value="{{ old('nb_gerencia') }}" style="font-size: 15px;" id="nb_gerencia" name="nb_gerencia" placeholder="Ingrese la gerencia ejecutiva">

                         </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nb_gerencia_alert"></span>
                        </div>
                       </div>
                        <div class="col-sm-4">
                          <div class="form-group form-equipos">
                          <label>Unidad Administrativa</label>

                         <div class="input-group">
                           <div class="input-group-prepend">
                               <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                          </div>
                            <input class="form-control" value="{{ old('nb_unidad_administrativa') }}" style="font-size: 15px;" id="nb_unidad_administrativa" name="nb_unidad_administrativa" placeholder="Ingrese la unidad administrativa">

                         </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nb_unidad_administrativa_alert"></span>
                        </div>
                       </div>
                       <div class="col-sm-4">
                          <div class="form-group form-equipos">
                           <label>Piso</label>
                             <div class="input-group">
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="mdi mdi-elevation-decline"></i></span>
                              </div>
                               <input class="form-control" value="{{ old('nu_piso') }}" style="font-size: 15px;" id="nu_piso" name="nu_piso" placeholder="Ingrese el piso">

                               </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nu_piso_alert"></span>
                        </div>
                       </div>
                       <input type="hidden" name="nu_tipo_asignacion" value="1" id="tipo_asignacion">
                       <div class="col-sm-4">
                          <div class="form-group form-equipos">
                           <label>Extensión</label>
                             <div class="input-group">
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="mdi mdi-elevation-decline"></i></span>
                              </div>
                               <input class="form-control" value="{{ old('nu_extension') }}" style="font-size: 15px;" id="nu_extension" name="nu_extension" placeholder="Ingrese la extensión del beneficiado">

                               </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nu_extension_alert"></span>
                        </div>
                       </div>
                        <div class="col-sm-8">
                          <div class="form-group form-equipos">
                           <label>Cantidad</label>
                             <div class="input-group">
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="mdi mdi-elevation-decline"></i></span>
                              </div>
                               <input class="form-control" value="{{ old('nu_cantidad') }}" style="font-size: 15px;" id="nu_cantidad" name="nu_cantidad" placeholder="Ingrese la cantidad de equipos asignados">

                               </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nu_cantidad_alert"></span>
                        </div>
                       </div>
                       <div class="col-sm-12">
                          <div class="form-group form-equipos">
                           <label>Nombre del especialista de soporte</label>
                             <div class="input-group">
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="mdi mdi-elevation-decline"></i></span>
                              </div>
                               <input class="form-control" value="{{ old('nb_especialista_soporte') }}" style="font-size: 15px;" id="nb_especialista_soporte" name="nb_especialista_soporte" placeholder="Ingrese el nombre del especialista de soporte">

                               </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nb_especialista_soporte_alert"></span>
                        </div>
                       </div>
                       <div class="col-sm-12 text-center">
                         <div class="form-group form-equipos">
                        <label class="font-weight-bolder" for="status">Acceso al sistema</label>
                        <div class="checkbox icheck">
                          <label class="font-weight-bolder">
                            <input type="radio" name="status" value="1" checked> Asignado&nbsp;&nbsp;
                            <input type="radio" name="status" value="2"> Retirado
                          </label>
                        </div>
                      </div>
                       </div> 
                      <div class="col-sm-12">
                          <div class="form-group form-equipos">
                           <label>Breve descripción de la asignación</label>
                             <div class="input-group">
                               <div class="input-group-prepend">
                                   <span class="input-group-text"><i class="mdi mdi-elevation-decline"></i></span>
                              </div>
                               <textarea name="descripcion" id="nb_marca" cols="30" rows="10" class="form-control"></textarea>

                               </div>
                            <!-- /.input group -->
                            <span class="missing_alert text-danger" id="nb_marca_alert"></span>
                        </div>
                       </div>
                       <div class="col-sm-6 form-equipos">
                         <button type="submit" class="btn blue darken-4 text-white  ajax" id="submit">
                          <i id="ajax-icon" class="fa fa-save"></i> Ingresar
                          </button>
                       </div>
                       
                       </form>
                   </div>
                 </div>
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
    <script type="text/javascript">

    $(document).ready(function(){
      $(".form-equipos").hide();
      $(".form-consumibles").hide();
      $("#select_tipo_cliente").on('change', function(){
        if($("#select_tipo_cliente").val() == "equipos"){
          $(".form-equipos-required").prop('required',false);
          $(".form-equipos").show();
          $("#tipo_asignacion").val(1);
          
          $(".form-persona-required").prop('required',true);
          $(".form-persona").hide();

        }else if($("#select_tipo_cliente").val() == "consumibles"){

          $(".form-persona-required").prop('required',false);
          $(".form-equipos").hide();
          $(".form-consumibles").show();
          $("#tipo_asignacion").val(2);

          

        }
      });
    });
  </script>
  <script src="{{ asset('js/admin/asignacion/create.js') }}"></script>
@endpush
  