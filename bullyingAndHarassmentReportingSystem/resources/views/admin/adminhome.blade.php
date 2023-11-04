
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminCss ')
  </head>
  <body>
    
   
      <!-- partial:partials/_navbar.html -->
    @include('admin.adminNavbar')
      <!-- partial -->
    @include('admin.adminSettings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
    @include('admin.adminSidebar')
        <!-- partial -->
    @include('admin.adminBody')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
    @include('admin.adminFooter')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
  
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    @include('admin.adminJs')
    <!-- End custom js for this page-->
  </body>
</html>