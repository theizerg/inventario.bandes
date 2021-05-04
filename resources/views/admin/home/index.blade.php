@extends('layouts.admin')
@section('title', 'Home')
@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
  @if(Auth::user()->hasrole('Administrador'))
  <div class="col-xl-6 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="fas fa-user-tie text-danger icon-lg fa-4x"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right font-weight-bold label fa-1x">Usuarios</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{App\Models\User::count()}} </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="fas fa-user-lock blue-darken-4-text icon-lg fa-4x"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right font-weight-bold label fa-1x">Permisos</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{Spatie\Permission\Models\Permission::count()}} </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="fas fa-lock orange-text icon-lg fa-4x"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right font-weight-bold label fa-1x">Roles</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{Spatie\Permission\Models\Role::count()}} </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @else

  <div class="col-xl-6 col-lg-3 col-md-3 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-laptop green-text icon-lg fa-4x"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right" style="font-size: 25px;">Equipos movibles</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">({{App\Models\Equipos::count()}}) </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-lg-3 col-md-3 col-sm-6">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-printer green-text icon-lg fa-4x"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right" style="font-size: 25px;">Equipos consumibles</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">({{App\Models\EquiposConsumibles::count()}}) </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endif

</div>
</div>

@endsection

