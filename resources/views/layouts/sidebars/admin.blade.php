<nav class="page-sidebar">
    <div class="slimScrollDiv" >
      <ul class="side-menu metismenu scroller" >
        <li class="{{Helper::navigation_selected('home')}}">
            <a href="/"><i class="sidebar-item-icon ti-home"></i>
                <span class="nav-label">Dashboard</span></a>
        </li>
        <li >
              <a href="javascript:;" aria-expanded="false"><i class="sidebar-item-icon ti-layout-grid3"></i>
                  <span class="nav-label">Lotes</span><i class="fa fa-angle-left arrow"></i></a>
              <ul class="nav-2-level collapse" aria-expanded="false" style="height: 0px;">
                  <li>
                      <a href="{{route('lotes.index')}}">Todos</a>
                  </li>
                  <li>
                      <a href="{{route('lotes.create')}}">Agregar</a>
                  </li>

              </ul>
          </li>
          <li>
                <a  href="javascript:;" aria-expanded="false"><i class="sidebar-item-icon ti-star"></i>
                    <span class="nav-label">Variedades</span><i class="fa fa-angle-left arrow"></i></a>
                <ul  class="nav-2-level collapse" aria-expanded="false" style="height: 0px;">
                    <li>
                        <a href="{{route('lotes.index')}}">Todas</a>
                    </li>
                    {{-- <li>
                        <a href="{{route('lotes.create')}}">Agregar</a>
                    </li> --}}

                </ul>
            </li>

        <li >
            <a href="#"><i class="sidebar-item-icon ti-home"></i>
                <span class="nav-label">Ordenes</span><i class="fa fa-angle-left arrow"></i></a>
        </li>
        <li>
            <a href="#"><i class="sidebar-item-icon ti-home"></i>
                <span class="nav-label">Pagos</span><i class="fa fa-angle-left arrow"></i></a>
        </li>
        {{-- <li >
            <a href="#"><i class="sidebar-item-icon ti-home"></i>
                <span class="nav-label">Usuarios</span><i class="fa fa-angle-left arrow"></i></a>
        </li> --}}
        <li>
              <a href="javascript:;" aria-expanded="false"><i class="sidebar-item-icon ti-user"></i>
                  <span class="nav-label">Usuarios</span><i class="fa fa-angle-left arrow"></i></a>
              <ul class="nav-2-level collapse" aria-expanded="false" style="height: 0px;">
                  <li>
                      <a href="{{route('users.index')}}">Todos</a>
                  </li>
                  <li>
                      <a href="{{route('users.create')}}">Agregar</a>
                  </li>

              </ul>
          </li>


    </ul>
    <div class="slimScrollBar">
    </div>
  </div>
</nav>
