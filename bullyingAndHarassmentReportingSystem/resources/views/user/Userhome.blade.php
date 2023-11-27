
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('user.UserCss')
  </head>
  <body>
    
   
      <!-- partial:partials/_navbar.html -->
    
    @include('user.UserNavbar')
      <!-- partial -->
    @include('user.UserSettings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('user.UserSidebar')
        <!-- partial -->
   
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
 
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    @include('user.UserFooter')
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    @include('user.UserJs')
    <!-- End custom js for this page-->
  </body>
</html>