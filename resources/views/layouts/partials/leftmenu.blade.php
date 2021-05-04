 <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link elevation-4">
      <img src="{{asset('images/logo/logo_bandes.png')}}" alt="AdminLTE Logo" height="80" class="text-center" 
            >
      
    </a>

   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{auth()->user()->display_name}} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon mdi mdi-view-dashboard"></i>
              <p>
                Administración
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @can('VerUsuario')
              <li class="nav-item">
                <a href="/user" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              @endcan
              @can('VerPermisos')
              <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon mdi mdi-lock"></i>
                <p>
                  Permisos
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <input type="hidden" value="{{$roles = Spatie\Permission\Models\Role::get()}}">
                @foreach ($roles as $role)
                <li class="nav-item">
                  <a href="/permission/{{ $role->name }}" class="nav-link">
                    <i class="mdi mdi-human-male-child nav-icon"></i>
                    <p>{{ $role->name }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endcan
            @can('VerRol')
              <li class="nav-item">
                <a href="/roles" class="nav-link">
                  <i class="fas fa-user-tie nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              @can('VerLogins')
              <li class="nav-item">
                <a href="/logins" class="nav-link">
                  <i class="fas fa-sign-in-alt nav-icon"></i>
                  <p>Logins</p>
                </a>
              </li>
              @endcan
              
            </ul>
          </li>
          @if (auth()->user()->hasRole('Usuario') )
          <li class="nav-item has-treeview menu-open ">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-box"></i>
              <p>
                INVENTARIO
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-store"></i>
                  <p>
                    Equipos movibles
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                     <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/equipos/create" class="nav-link">
                      <i class="far fa-plus-square nav-icon"></i>
                      <p>Agregar equipo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/equipos" class="nav-link">
                      <i class="fas fa-clipboard-list nav-icon"></i>
                      <p>Vista general</p>
                    </a>
                  </li>
                </ul>
             </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-print"></i>
                  <p>
                    Eq. Consumibles
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                     <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/consumibles/create" class="nav-link">
                      <i class="far fa-plus-square nav-icon"></i>
                      <p>Agregar nuevo</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/consumibles" class="nav-link">
                      <i class="fas fa-clipboard-list nav-icon"></i>
                      <p>Vista general</p>
                    </a>
                  </li>
                </ul>
             </ul>
          </li>
          <li class="nav-item has-treeview menu-open ">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-check"></i>
              <p>
                ASIGNACIÓN
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-store"></i>
                  <p>
                    ASIGNAR EQUIPO
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/asignacion/create" class="nav-link">
                      
                      <i class="far fa-plus-square nav-icon"></i>
                      <p>Agregar asignación</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/equipos" class="nav-link">
                      <i class="fas fa-clipboard-list nav-icon"></i>
                      <p>Vista general</p>
                    </a>
                  </li>
                </ul>
             </ul>
             <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon mdi mdi-monitor"></i>
                  <p>
                    EQUIP. CONSUMIBLE
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                  <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/consumible" class="nav-link">
                      
                      <i class="far fa-plus-square nav-icon"></i>
                      <p>Agregar asignación</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/asignacion" class="nav-link">
                      <i class="fas fa-clipboard-list nav-icon"></i>
                      <p>Vista general</p>
                    </a>
                  </li>
                </ul>
             </ul>
          </li>
      </li>
      @endif  
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->