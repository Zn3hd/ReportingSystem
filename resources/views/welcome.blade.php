<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SNSU Bullying and Harrassment Reporting System</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block navbar-klean" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"> <img class="me-3 d-inline-block" src="" alt="" /></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
       
        @if (Route::has('login'))
           
                @auth
                    <a href="{{ url('/home') }}" class="">Dashboard</a>
                @else
                  
                    <form class="ps-lg-5">
                       
                            <a href="{{ route('login') }}" class="btn hover-top btn-glow btn-klean">Sign in</a>
                        
                        @if (Route::has('register'))
                           
                                <a href="{{ route('register') }}"class="btn hover-top btn-glow btn-klean">Sign Up</a>
                          
                        @endif
                    </form>
                @endauth
            </div>
        @endif
    

           
          </div>
        </div>
      </nav>
      <section id="home">
        <div class="bg-holder d-none d-md-block bg-size" style="background-image:url(assets/img/illustrations/hero.png);background-position:right bottom;">
        </div>
        

        <div class="bg-holder" style="background-image:url(https://fghemis.snsu.edu.ph/hope/bg/SNSU TEMPLATE.png);background-position:center;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
              <h1 class="fw-bold display-4 fs-4 fs-lg-6 fs-xxl-7 text-gradient"> SNSU </h1>
              <h1 class="text-700">Bullying and Harrassment <span class="fw-bold">Reporting System</span></h1>
              <p class="mb-5 fs-0"> Our aim is to have a Bullying and  <br class="d-none d-lg-block" /> Harrassment Free UNIVERSITY.</p><a class="btn hover-top btn-glow btn-klean" href="{{ route('register') }}">Register Now</a>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
    
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
     
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      

              
        <!--/.bg-holder-->

      
            

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      

         
             
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


   
                    
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
     

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0" id="contact">

        <div class="container">
          <div class="row">
            <div class="col-lg-7 col-xxl-5 mx-auto text-center mt-5">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-5">Contact Us</h5>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-5 mb-8">
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/contact-us-bg.png);background-position:left bottom;background-size:auto;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder" style="background-image:url(assets/img/gallery/contact-bg.png);background-position:center right ;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center">
            <div class="col-lg-5 mb-5">
              <div class="card card-bg p-2">
                <div class="card-body">
                  <form>
                    <div class="row mb-3 input-group-icon">
                      <label class="col-sm-2 col-form-label visually-hidden" for="inputName">Name</label>
                      <div class="col-sm-12">
                        <input class="form-control rounded-pill border-white input-box" id="inputName" type="text" placeholder="Write your name" />
                        <svg class="bi bi-person-fill input-box-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="row mb-3 input-group-icon">
                      <label class="col-sm-2 col-form-label visually-hidden" for="inputEmail3">Email</label>
                      <div class="col-sm-12">
                        <input class="form-control rounded-pill border-white input-box" id="inputEmail3" type="email" placeholder="Write your email" />
                        <svg class="bi bi-envelope-fill input-box-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="row mb-3 input-group-text-icon">
                      <label class="col-sm-2 col-form-label visually-hidden" for="floatingTextarea2">Comments</label>
                      <div class="col-sm-12">
                        <textarea class="form-control rounded-3 border-white input-box" id="floatingTextarea2" placeholder="Write your message" style="height: 150px"></textarea>
                        <svg class="bi bi-pencil-fill input-box-text-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"></path>
                        </svg>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="d-grid">
                          <button class="btn hover-top btn-glow btn-klean rounded-pill" type="submit">Submit </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
              <div class="d-flex align-items-center mb-5">
                <div class="icon icon-primary"><span data-feather="phone"></span></div>
                <div class="flex-1 ms-3">
                  <p class="fw-bold mb-0">Phone </p>
                  <p>12345678901</p>
                </div>
              </div>
              <div class="d-flex align-items-center mb-5">
                <div class="icon icon-primary"><span data-feather="mail"></span></div>
                <div class="flex-1 ms-3">
                  <p class="fw-bold mb-0">Email</p>
                  <p>something@email.com </p>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div class="icon icon-primary"><span data-feather="map-pin"></span></div>
                <div class="flex-1 ms-3">
                  <p class="fw-bold mb-0">Location</p>
                  <p>,<br /> 4220 Narcisco Street, Surigao City, <br />SURIGAO DEL NORTE</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      </section>
      <section class="pb-0 pt-6">
        <div class="bg-holder" style="background-image:url(assets/img/illustrations/footer-bg.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-lg-between circle-blend-right circle-danger">
            <div class="col-6 col-sm-4 col-lg-auto mb-3">
             
              <h5 class="text-600 mb-3 fw-bold">Follow Us</h5>
              <ul class="list-unstyled list-inline my-3">
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/facebook.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/twitter.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/linkdin.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"><img class="list-social-icon" src="assets/img/icons/youtube.svg" alt="" width="25" /></a></li>
                <li class="list-inline-item"><a class="text-decoration-none" href="#!"></a></li>
              </ul>
              <p class="fw-semi-bold mt-4 mb-3">Subscribe to our newsletter</p>
              <label class="col-sm-2 col-form-label visually-hidden" for="inputEmail2">Email</label>
              <div class="col-sm-12 input-group-icon">
                <input class="form-control rounded-pill border-white py-1 px-4" id="inputEmail2" type="email" placeholder="email" />
                <svg class="bi bi-envelope-fill input-box-icon" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16" style="left:.8rem;">
                  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"></path>
                </svg>
              </div>
            </div>
          </div>
          <hr class="text-100 mb-0" />
          <div class="row justify-content-md-between justify-content-evenly py-3">
            <div class="col-12 col-sm-8 col-md-6 col-lg-auto text-center text-md-start">
              <p class="fs--1 my-2 fw-bold">All rights Reserved &copy; SNSU, 2023</p>
            </div>
            <div class="col-12 col-sm-8 col-md-6">
              <p class="fs--1 my-2 text-center text-md-end"> Made with&nbsp;
                <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="#EB6453" viewBox="0 0 16 16">
                  <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z"></path>
                </svg>&nbsp;by&nbsp;<a class="fw-bold text-500" href="" target="_blank"> WM/DM </a>
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="assets/vendors/@popperjs/popper.min.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="assets/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script>
      feather.replace();
    </script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
  </body>

</html>