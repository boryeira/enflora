<nav class="page-sidebar">
    <div class="slimScrollDiv" >
      <ul class="side-menu metismenu scroller" >
        <li class="{{Helper::navigation_selected('/')}}">
            <a href="{{route('users.show',Auth::user()->id)}}"><i class="sidebar-item-icon ti-home"></i>
                <span class="nav-label">Perfil</span></a>
        </li>
        <li class="{{Helper::navigation_selected('orders')}}" >
              <a href="javascript:;" aria-expanded="false"><i class="sidebar-item-icon ti-layout-grid3"></i>
                  <span class="nav-label">Ordenes</span><i class="fa fa-angle-left arrow"></i></a>
              <ul class="nav-2-level collapse" aria-expanded="false" style="height: 0px;">
                  <li>
                      <a href="{{route('orders.my')}}">Todas</a>
                  </li>
                  <li>
                      <a href="{{route('orders.create')}}">Nueva</a>
                  </li>

              </ul>
          </li>
    </ul>
    <div class="slimScrollBar">
    </div>
  </div>
</nav>
