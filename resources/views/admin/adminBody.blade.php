<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Dashboard</h2>
                    <p class="card-description">
                        Welcome, {{ Auth::user()->name }}! Here's an overview of the system.
                    </p>
                    <div class="row">
                        <!-- Total Users Card -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-gradient-primary border-0">
                                <div class="card-body py-4">
                                    <p class="card-title text-white">Total Users</p>
                                    <h2 class="text-white">{{ $totalUsers }}</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Reports Card -->
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-gradient-danger border-0">
                                <div class="card-body py-4">
                                    <p class="card-title text-white">Pending Reports</p>
                                    <h2 class="text-white">{{ $pendingReports }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dynamic chart display -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h2 class="card-title">Reports Overview</h2>
                            <canvas id="dynamicChart" width="1200" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Assuming $dynamicChartData is a PHP array passed to the view
    var dynamicChartCtx = document.getElementById('dynamicChart').getContext('2d');
    var dynamicChartLabels = [];
    var dynamicChartData = [];

    @if(isset($dynamicChartData))
        @foreach($dynamicChartData as $data)
            dynamicChartLabels.push('{{ $data->label }}');
            dynamicChartData.push({{ $data->value }});
        @endforeach
        console.log(dynamicChartLabels, dynamicChartData); // Check the console for data

        var dynamicChart = new Chart(dynamicChartCtx, {
            type: 'bar',
            data: {
                labels: dynamicChartLabels,
                datasets: [{
                    label: 'Dynamic Chart',
                    data: dynamicChartData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
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
    @endif
</script>

</body>
</html>
