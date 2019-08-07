<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-center">
      <img src="{{asset('img/').'/'.$settings->logo}}" alt="AdminLTE Logo" class=" img-circle elevation-3"
           style="opacity: .8;    max-height: 50px;">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
       {{--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="https://secure.gravatar.com/avatar/5ffa2a1ffeb767c60ab7e1052e385d5c?s=52&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">محمدرضا عطوان</a>
          </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar ayat-nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  
                  <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link ayat-nl @if(Request::segment(2) =='') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                      <p>إعدادات الموقع</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('admin.Beneficiaries')}}" class="nav-link ayat-nl @if(Request::segment(2) =='Beneficiaries') active @endif">
                        <i class="nav-icon fa fa-users"></i>
                        <p>إدارة المستفيدين</p>
                      </a>
                  </li>
                  @if(Auth::user()->id == 1)
                  <li class="nav-item">
                      <a href="{{route('admin.Supervisor')}}" class="nav-link ayat-nl @if(Request::segment(2) =='Supervisor') active @endif">
                          <i class="fa fa-server" aria-hidden="true"></i>
                        <p>إدارة المشرفين</p>
                      </a>
                  </li>
                  @endif
                  
                </ul>
              </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>