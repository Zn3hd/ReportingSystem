<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.adminCss ')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Summary Visualization</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       

      

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px; /* Add padding to give space between content and footer */
            height: 
        }

      
    </style>
</head>
<body>
@include('admin.adminNavbar')
      <!-- partial -->
    @include('admin.adminSettings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin.adminSidebar')
        <!-- partial -->
        <main>
        
       
           
    <h2>Overall Report Summary</h2>
    <div style="width: 100%;">
        <canvas id="reportChart"></canvas>
    </div>
  
    
       
   
  
        
    </div>
    @include('admin.adminFooter')
    </main>
  
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

    <script>
        // Assuming $reportSummary is a PHP array passed to the view

        var ctx = document.getElementById('reportChart').getContext('2d');

        var labels = [];
        var data = [];

        <?php foreach($reportSummary as $status): ?>
            labels.push('<?php echo ucfirst($status->status); ?> Reports');
            data.push(<?php echo $status->total; ?>);
        <?php endforeach; ?>

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Reports',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // You can customize the color
                    borderColor: 'rgba(75, 192, 192, 1)', // You can customize the color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
