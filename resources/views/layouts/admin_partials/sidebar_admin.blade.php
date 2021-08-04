
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      WARMZILLA
      <!-- <img src="{{asset('images/logo-warmzilla.jpg')}}" alt="AdminLTE Logo" class="brand-image  elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">WARMZILLA</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{url('boiler/dashboard')}}" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('boiler/dashboard')}}" class="nav-link {{request()->is('admin*')?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link {{request()->is('users*')?'active':''}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @php 
          if(request()->is('finish*') || request()->is('boilerbrand*') || request()->is('boilercategory*'))
          {
            $estimate_menu_open_close  = 'menu-open';
            $estimate_menu_active      = 'active';
          }else{
            $estimate_menu_open_close  = 'menu-close';
            $estimate_menu_active      = '';
          }
          @endphp
          @php 
          if(request()->is('boilerlocation*') || request()->is('boilerlocationarea*'))
          {
            $boiler_loc_open_close  = 'menu-open';
            $boiler_loc_active      = 'active';
          }else{
            $boiler_loc_open_close  = 'menu-close';
            $boiler_loc_active      = '';
          }
          @endphp
          @php 
          if(request()->is('options*') || request()->is('page*') )
          {
            $boiler_menu_open_close  = 'menu-open';
            $boiler_menu_active      = 'active';
          }else{
            $boiler_menu_open_close  = 'menu-close';
            $boiler_menu_active      = '';
          }
          @endphp

            <li class="nav-item has-treeview {{$estimate_menu_open_close}}">
            <a href="#" class="nav-link {{$estimate_menu_active}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Boilers Group
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('boiler/finish')}}" class="nav-link {{request()->is('boiler/finish*')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boilers </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('boiler/boilerbrand')}}" class="nav-link {{request()->is('boiler/boilerbrand*')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boiler Brands</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('boiler/boilercategory')}}" class="nav-link {{request()->is('boiler/boilercategory*')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Boiler Models</p>
                    </a>
                  </li>    
                  <!--<li class="nav-item">-->
                  <!--  <a href="{{url('/boilerlocation')}}" class="nav-link {{request()->is('boilerlocation*')?'active':''}}">-->
                  <!--  <i class="far fa-circle nav-icon"></i>-->
                  <!--    <p>Boiler Installation Locations</p>-->
                  <!--  </a>-->
                  <!--</li>    -->
                  <!--<li class="nav-item">-->
                  <!--  <a href="{{url('/boilerlocationarea')}}" class="nav-link {{request()->is('boilerlocationarea*')?'active':''}}">-->
                  <!--  <i class="far fa-circle nav-icon"></i>-->
                  <!--    <p>Boiler Installation Areas</p>-->
                  <!--  </a>-->
                  <!--</li>    -->
                </ul>
          </li>
          
            <li class="nav-item has-treeview {{$boiler_loc_open_close}}">
                <a href="#" class="nav-link {{$boiler_loc_active}}">                
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Boiler Installation Locations
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{url('boiler/boilerlocation')}}" class="nav-link {{request()->is('boiler/boilerlocation*')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Boiler Installation Cities </p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{url('/boilerlocationarea')}}" class="nav-link {{request()->is('boilerlocationarea*')?'active':''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Boiler Installation Areas </p>
                        </a>
                    </li> -->
                </ul>
            </li>    
          
          <li class="nav-item has-treeview {{$boiler_menu_open_close}}">
            <a href="#" class="nav-link {{$boiler_menu_active}}">                
                
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('boiler/options')}}" class="nav-link {{request()->is('boiler/options/brand*')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boiler Brands </p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="{{url('boiler/page/title')}}" class="nav-link {{request()->is('boiler/page/title')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boiler title</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('boiler/page/comparison_page')}}" class="nav-link {{request()->is('boiler/page/comparison_page')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boiler comparison page</p>
                    </a>
                  </li>
                 
                  <li class="nav-item">
                    <a href="{{url('boiler/page/comparison')}}" class="nav-link {{request()->is('boiler/page/comparison')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boiler comparison </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('boiler/page/finance')}}" class="nav-link {{request()->is('boiler/page/finance')?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Boiler finance</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('boiler/page/boilerLocation')}}" class="nav-link {{request()->is('boiler/page/boilerLocation')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Boiler Installation Locations</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('boiler/page/combiboiler')}}" class="nav-link {{request()->is('boiler/page/combiboiler')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Combi Boiler</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('boiler/page/regularboiler')}}" class="nav-link {{request()->is('boiler/page/regularboiler')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Regular Boiler</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="{{url('boiler/page/systemboiler')}}" class="nav-link {{request()->is('boiler/page/systemboiler')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                      <p>System Boiler</p>
                    </a>
                  </li> 
                   <li class="nav-item">
                    <a href="{{url('boiler/page/boilerseo')}}" class="nav-link {{request()->is('boiler/page/boilerseo')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                      <p>Boiler SEO</p>
                    </a>
                  </li>                    
                  
                  
                </ul>
          </li> 
          <!--<li class="nav-item">-->
          <!--  <a href="{{url('/options')}}" class="nav-link {{request()->is('options*')?'active':''}}">-->
          <!--    <i class="far fa-circle nav-icon"></i>-->
          <!--    <p>Options</p>-->
          <!--  </a>-->
          <!--</li>          -->
          <!-- <li class="nav-item">-->
          <!--  <a href="{{url('estimate/show')}}" class="nav-link {{request()->is('estimate*')?'active':''}}">-->
          <!--    <i class="nav-icon fas fa-th"></i>-->
          <!--    <p>Users Estimate</p>-->
          <!--  </a>-->
          <!--</li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>