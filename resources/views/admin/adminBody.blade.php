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
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-gradient-primary border-0">
                                <div class="card-body py-4">
                                    <p class="card-title text-white">Total Users</p>
                                    <h2 class="text-white">{{ $totalUsers }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card bg-gradient-danger border-0">
                                <div class="card-body py-4">
                                    <p class="card-title text-white">Pending Reports</p>
                                    <h2 class="text-white">{{ $pendingReports }}</h2>
                                </div>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->

                        <!-- Example chart display -->
                        <div class="col-md-12 mt-4">
                            <h2 class="card-title">Reports Overview</h2>
                            <canvas id="reportChart" width="1200" height="500"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>