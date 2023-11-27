<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.adminCss')
    <style>
        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
           
            padding: px;
            width: 100;
            height: 100;
        }

        h2 {
            color: #333;
        }

        .dashboard {
            display: flex;
           
            justify-content:;
            width: 100%;
        }

        .report-container {
            flex: 1;
            margin-bottom: px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .verified, .unverified {
            padding: 8px 12px;
            border-radius: 4px;
            font-weight: bold;
        }

        .verified {
            color: #4CAF50;
            background-color: #e7f6e7;
        }

        .unverified {
            color: #D32F2F;
            background-color: #f9e6e6;
        }

        button.reject {
            background-color: #D32F2F;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.reject:hover {
            background-color: #FF5252;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        .report-detail {
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

<main>
    <div class="dashboard">
        <div class="report-container">
            <h2>Verified Reports</h2>
            @foreach ($verifiedReports as $report)
                @include('_report-details', ['report' => $report])
            @endforeach
        </div>

        <div class="report-container">
            <h2>Unverified Reports</h2>
            @foreach ($unverifiedReports as $report)
                @include('_report-details', ['report' => $report])
            @endforeach
        </div>

    </div>
   
    @include('admin.adminFooter')
  
</main>

   
<!-- Footer -->


<!-- JavaScript -->
@include('admin.adminJs')

</body>
</html>
