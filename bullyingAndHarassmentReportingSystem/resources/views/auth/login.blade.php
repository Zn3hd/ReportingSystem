<!DOCTYPE html>
<html lang="en">

<head>
<style>
    body {
      background-image: url("images/faces/snsu background image.png"); /* Replace 'path_to_your_image.jpg' with your image file path */
      background-size: cover; 
      margin: 0;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-size: 10rem;
      font-weight: 1000;
      line-height: 5;
     color: #001737;
  text-align: left;/* Adjust as needed */
      /* Additional background properties if necessary */
    }
    .brand-logo {
    
      background-color: skyblue;
      color: black;

    }
    .floating-container {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1000;
    }
    .my-2 {
 
}

.my-2 .form-check-label {
  color: black;
  margin-bottom: 0; /* Remove the default margin-bottom for label */
}
/* Style the default checkbox */
.my-2 .form-check-input {
  width: 16px; /* Adjust the size of the checkbox */
  height: 16px;
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  border: 1px solid #ccc; /* Border color */
  border-radius: 3px; /* Optional: Add border-radius for rounded corners */
  outline: none; /* Remove the default focus outline */
}

/* Style the checkmark inside the custom checkbox */
.my-2 .form-check-input:checked {
  background-color: #2196F3; /* Background color when checked */
  border-color: #2196F3; /* Border color when checked */
}

/* Hide the default checkmark */
.my-2 .form-check-input:checked::before {
  content: '';
  display: block;
  width: 12px; /* Adjust the size of the checkmark */
  height: 6px;
  border: solid #fff; /* Checkmark color */
  border-width: 0 2px 2px 0;
  transform: rotate(45deg);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}


 

  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SNSU bullying and harrassmen reprting system </title>
  <!-- base:css --> 
  <link rel="stylesheet" href="../../vendors/typicons.font/font/typicons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
 
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
          <div class="floating-container">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
             
              <h2>Hello! Let's get started</h2>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <!-- Laravel Blade login form -->
              <form method="POST" action="{{ route('login') }}" class="pt-3">
                <!-- Laravel Blade CSRF Token -->
                <!-- @csrf -->
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="typcn typcn-social-facebook-circular mr-2"></i>Connect using Facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
