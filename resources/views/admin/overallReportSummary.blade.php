<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminCss')
    <style>
      body {
        background-color: #f4f4f4;
        font-family: 'Arial', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
      }

      .content-wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }

      .form-scroll-container {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
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
        border-radius: 25px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s;
        display: block;
        margin: 0 auto;
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

      .report-summary {
        text-align: center;
        margin-top: 20px;
      }

      .report-summary h3 {
        color: #3498db;
      }

      .report-summary ul {
        list-style-type: none;
        padding: 0;
      }

      .report-summary li {
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    @include('admin.adminNavbar')

    <!-- Settings -->
    @include('admin.adminSettings')

    <!-- Sidebar -->
    @include('admin.adminSidebar')

    <div class="content-wrapper">
      <div class="form-scroll-container">
        <div class="form-container">
          <h1>Your Form Title</h1>
          <!-- Your form content goes here -->
        </div>
      </div>

      <div class="report-summary">
        <h3>Overall Report Summary</h3>
        <ul>
          <li>Verified Reports: {{ $reportSummary['verified'] ?? 0 }}</li>
          <li>Pending Reports: {{ $reportSummary['pending'] ?? 0 }}</li>
          <li>Rejected Reports: {{ $reportSummary['rejected'] ?? 0 }}</li>
        </ul>
      </div>

      <!-- Footer -->
      @include('admin.adminFooter')
    </div>

    <!-- JavaScript -->
    @include('admin.adminJs')
  </body>
</html>
