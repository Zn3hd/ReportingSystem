<div class="container-scroller">
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <h3>Guidance office</h3>
          <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span class="typcn typcn-th-menu"></span>
          </button>

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
         
            <li class="nav-item  d-none d-lg-flex">
              
              </a>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
           
            <li class="nav-item dropdown d-flex">
          
             
              
              
            <li class="nav-item dropdown  d-flex">
             
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
               
                
       
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle  pl-0 pr-0" href="#" data-toggle="dropdown" id="profileDropdown">
                <i class="typcn typcn-user-outline mr-0"></i>
                <span class="nav-profile-name">User</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
    <a class="dropdown-item" href="#">
        <i class="typcn typcn-cog text-primary"></i>
        Settings
    </a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="dropdown-item">
            <i class="typcn typcn-power text-primary"></i>
            Log Out
        </button>
    </form>
</div>

      </nav>