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

          </li>
          <li>
            <form class="form-info m-3" action="{{route('logout')}}" method="POST" >
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <button class="d-flex align-items-center btn btn-danger btn-sm">Logout<i class="ti-shift-right ml-2 font-20"></i></button>
            </form>
          </li>
          {{-- <li class="{{Helper::navigation_selected('strains')}}" >
                <a href="{{route('orders.index')}}" aria-expanded="false"><i class="sidebar-item-icon ti-layout-grid3"></i>
                    <span class="nav-label">Variedades</span><i class="fa fa-angle-left arrow"></i></a>

          </li>
          <li>
            <form class="form-info m-3" action="{{route('logout')}}" method="POST" >
              <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
              <button class="d-flex align-items-center btn btn-danger btn-sm">Logout<i class="ti-shift-right ml-2 font-20"></i></button>
            </form>
          </li> --}}

    </ul>
    <div class="slimScrollBar">
    </div>
  </div>
</nav>
