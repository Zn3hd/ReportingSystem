
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminCss ')
    <style>
       

body {
  background-color: #f4f4f4;
  font-family: 'Arial', sans-serif;
  color: #333;
}
.content-wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh; /* Set the height to 100% of the viewport height */
        }
 .form-scroll-container {
            flex: 1; /* Make this container take the available space */
            overflow-y: auto; /* Enable vertical scrolling */
        }

.form-container {
    
           width: 80%;
           max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
           box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        
}

h1 {
  text-align: center;
  color: #3498db;
  font-family: 'Roboto', sans-serif;

}

.form-sample {
  margin-top: 20px;
}

.form-label {
  display: block;
  font-weight: bold;
}

.form-group {
  margin-bottom: 20px;
  position: relative;
}

textarea,
input[type="text"],
input[type="datetime-local"],
input[type="file"],
select {
  width: 100%;
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 15px;
  box-sizing: border-box;
  border: 1px solid #ced4da;
  border-radius: 4px;
  background-color: #fff;
  color: #495057;
}

button {
  background-color: #3498db;
  color: #fff;
  padding: 15px 20px;
  border: none;
  border-radius: 25px; /* Increased border-radius for an oval shape */
  cursor: pointer;
  font-size: 18px;
  transition: background-color 0.3s;
}


  button:hover {
  background-color: #007bb5;
}
.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
    border-radius: 4px;
    padding: 10px;
    margin-top: 5px;
}
    </style>
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
 
		<div class="report-summary">
    <h3>Overall Report Summary</h3>
    <ul>
        <li>Verified Reports: {{ $reportSummary['verified'] ?? 0 }}</li>
        <li>Pending Reports: {{ $reportSummary['pending'] ?? 0 }}</li>
        <li>Rejected Reports: {{ $reportSummary['rejected'] ?? 0 }}</li>
       
    </ul>
</div>

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



