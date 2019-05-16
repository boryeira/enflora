<nav class="page-sidebar">
    <div class="slimScrollDiv" >
      <ul class="side-menu metismenu scroller" >
        <li class="heading">Menu</li>
        <li class="{{Helper::navigation_selected('profile')}}" >
              <a href="{{route('users.show',['user'=>Auth::user()->id])}}" aria-expanded="false"><i class="sidebar-item-icon ti-layout-grid3"></i>
                  <span class="nav-label">Perfil</span><i class="fa fa-angle-left arrow"></i></a>

          </li>
        <li class="{{Helper::navigation_selected('orders')}}" >
              <a href="{{route('orders.index')}}" aria-expanded="false"><i class="sidebar-item-icon ti-layout-grid3"></i>
                  <span class="nav-label">Ordenes</span><i class="fa fa-angle-left arrow"></i></a>
              {{-- <ul class="nav-2-level collapse" aria-expanded="false" style="height: 0px;">
                  <li>
                      <a href="{{route('orders.index')}}">Todas</a>
                  </li>
                  <li>
                      <a href="{{route('orders.create')}}">Nueva</a>
                  </li>

              </ul> --}}
          </li>
          <li class="{{Helper::navigation_selected('strains')}}" >
                <a href="{{route('orders.index')}}" aria-expanded="false"><i class="sidebar-item-icon ti-layout-grid3"></i>
                    <span class="nav-label">Variedades</span><i class="fa fa-angle-left arrow"></i></a>

          </li>
    </ul>
    <div class="slimScrollBar">
    </div>
  </div>
</nav>
