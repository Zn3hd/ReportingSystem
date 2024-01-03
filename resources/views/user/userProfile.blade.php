<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.UserCss')
    <style>
       
    </style>
</head>

<body>

    <!-- Navbar -->
    @include('user.UserNavbar')

    <!-- Settings -->
    @include('user.UserSettings')

    <!-- Sidebar -->
    @include('user.UserSidebar')

    <!-- Main Content -->
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>

        <div class="max-content-width py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

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