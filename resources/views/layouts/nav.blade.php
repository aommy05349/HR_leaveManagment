<header class="header black-bg">
    <div class="sidebar-toggle-box">
      <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
    </div>
    <!--logo start-->
    <a href="index.html" class="logo"><b>SANDEE<span>TOWN</span></b></a>
    <!--logo end-->
    <div class="top-menu">
      <ul class="nav pull-right top-menu">
        <br>
        {{-- <li><a class="logout" href="login.html">Logout</a></li> --}}
        <form class="logout"  action="{{ route('logout') }}" method="POST" >
            @csrf
            <button class=" logout btn btn-theme" type="submit">Logout</button>   
        </form>
      </ul>
    </div>
  </header>
    {{-- <div class="top-menu">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            <li>Logout</li>
        </form>
    </div>  --}}
 