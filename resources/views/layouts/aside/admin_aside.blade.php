<aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src=" {{ asset('assets/backend/img/ui-sam.jpg') }}" class="img-circle" width="80"></a></p>
            <h5 class="centered">
            <div class="text-wrapper">
                <p class="profile-name">{{ Auth::user()->name }}</p>
                <div>
                  <small class="designation text-muted">
                      <h6 style="color:#48cfad;font-size:14px;"><i class="fa fa-circle" ></i> 
                        @if( Auth::user()->type == 3)  Admin  @endif
                      </h6>
                    
                  </small>
                  {{-- <span class="status-indicator online"></span> --}}
                </div>
              </div>
            </h5>
            <li class="mt">
              <a href="{{ url('/admin/dashboard') }}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-users"></i>
                <span>จัดการชื่อผู้ใช้ระบบ</span>
                </a>
              <ul class="sub">
                <li><a href="{{ url('/admin/employee') }}">พนักงาน</a></li>
                <li><a href="buttons.html">เจ้าของโครงการ</a></li>
                <li><a href="panels.html">ลูกบ้าน</a></li>
              </ul>
            </li>
           
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>