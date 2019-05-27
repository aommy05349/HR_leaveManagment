<nav class="sidebar sidebar-offcanvas " id="sidebar">
    <ul class="nav">
            <li class="nav-item nav-profile ">
                    <div class="nav-link">
                      <div class="user-wrapper">
                        <div class="profile-image">
                          <img class="img-xs rounded-circle" src="{{ Auth::user()->getFirstMediaUrl('avatar') != null ? Auth::user()->getFirstMediaUrl('avatar') : asset('images/noimage.png') }}" alt="logo"/>
                        </div>
                        <div class="text-wrapper">
                          <p class="profile-name">{{ Auth::user()->full_name }}</p>
                          <div>
                            <small class="designation text-muted">{{ Auth::user()->level }}</small>
                            <span class="status-indicator online"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <li class="nav-item">
                        <a href="{{ url('/logout') }}" class="nav-link ">
                          <i class="fa fa-power-off"></i>&nbsp;
                          <span>Logout</span>
                      </a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link text-dark"  href="{{ url('/') }}">
                          <i class="fa fa-dashboard"></i>&nbsp;
                          <span class="menu-title">dashboard</span>
                      </a>
                    </li>
                    <li class="nav-item active" {{ Auth::user()->level != 'ADMIN' ? 'hidden' : 'visibility' }}>
                      <a class="nav-link text-dark"  href="{{ url("/user") }} ">
                          <i class="fa fa-user-o"></i>&nbsp;
                          <span class="menu-title">User</span>
                      </a>
                    </li>
                    <li class="nav-item active" {{ Auth::user()->level != 'ADMIN' ? 'hidden' : 'visibility' }}>
                      <a class="nav-link text-dark"   href="{{ url("/leaveApp") }} ">
                          <i class="fa fa-calendar-o"></i>&nbsp;
                          <span class="menu-title">Leave Applications</span>
                      </a>
                    </li>
                    <li class="nav-item active" >
                        {{-- <a class="nav-link"  href="{{ url('/profile/') }} "> --}}
                        <a class="nav-link text-dark"  href="{{ url('/profile/'.Auth::user()->id) }} ">
                            <i class="fa fa-user-o"></i>&nbsp;
                            <span class="menu-title">Profile</span>
                        </a>
                      </li>
                    <li class="nav-item active">
                      <a class="nav-link text-dark"  href="{{ url("/leave") }} ">
                          <i class="fa fa-calendar"></i>&nbsp;
                          <span class="menu-title">Leave</span>
                      </a>
                    </li>
            </li>
    </ul>
</nav>