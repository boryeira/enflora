<header class="header">
            <!-- START TOP-LEFT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                    <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                </li>
            </ul>
            <!-- END TOP-LEFT TOOLBAR-->
            <!--LOGO-->
          {{-- <img src="{{asset('img/enflora.png')}}" width="150"/> --}}
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li>
                  <form class="form-info" action="{{route('logout')}}" method="POST" >
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <button class="d-flex align-items-center btn btn-danger btn-sm">Logout<i class="ti-shift-right ml-2 font-20"></i></button>
                  </form>
                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </header>
