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
          <img src="{{asset('img/enflora.png')}}" width="150"/>
            <!-- START TOP-RIGHT TOOLBAR-->
            <ul class="nav navbar-toolbar">
                <li class="nav-link">
                  <span>{{Auth::user()->full_name}} </span>
                </li>

                <li class="nav-link">

                </li>
            </ul>
            <!-- END TOP-RIGHT TOOLBAR-->
        </header>
