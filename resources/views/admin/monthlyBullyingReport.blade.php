<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminCss')

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Include DataTables Buttons JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- Include PDFMake for PDF export -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Include DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">

    <style>
        /* Add your existing styles here */

        /* New styles for improved design */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0px;
            background-color: #f4f4f4;
        }

        .report-container {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            overflow: hidden;
            width: 100%; /* Changed to 100% for responsiveness */
        }

        h3 {
            color: #333;
            margin-top: 0;
            padding: 15px;
            background-color: #3498db;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Added margin for better spacing */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 20px; /* Adjusted padding for better spacing */
            text-align: left;
            width: auto; /* Adjusted width to let columns expand based on content */
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        .no-data {
            padding: 15px;
            text-align: center;
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
                <h3>Highest Reporting Rate</h3>
                @if ($highestReportingRate)
                    <table>
                        <tr>
                            <th>Bullying Type</th>
                            <th>Name of Suspects</th>
                            <th>Total Reports</th>
                        </tr>
                        <tr>
                            <td>{{ $highestReportingRate->bullying_type }}</td>
                            <td>{{ $highestReportingRate->name_of_suspects }}</td>
                            <td>{{ $highestReportingRate->total }}</td>
                        </tr>
                    </table>
                @else
                    <p class="no-data">No reports for the highest reporting rate.</p>
                @endif
            </div>

            <div class="report-container">
                <h3>Highest Suspect Rate</h3>
                @if ($highestSuspectRate)
                    <table>
                        <tr>
                            <th>Bullying Type</th>
                            <th>Name of Suspects</th>
                            <th>Total Reports</th>
                        </tr>
                        <tr>
                            <td>{{ $highestSuspectRate->bullying_type }}</td>
                            <td>{{ $highestSuspectRate->name_of_suspects }}</td>
                            <td>{{ $highestSuspectRate->total }}</td>
                        </tr>
                    </table>
                @else
                    <p class="no-data">No reports for the highest suspect rate.</p>
                @endif
            </div>

            <div class="report-container">
                <h3>Highest Behavior Rates</h3>
                @if (!empty($highestBehaviorRates))
                    <table>
                        <tr>
                            <th>Bullying Behavior</th>
                            <th>Rate</th>
                        </tr>
                        @foreach ($highestBehaviorRates as $behavior => $rate)
                            <tr>
                                <td>{{ $behavior }}</td>
                                <td>{{ $rate }}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <p class="no-data">No reports for bullying behaviors.</p>
                @endif
            </div>

            <div class="report-container">
                <h3>Monthly Reports</h3>
                <table id="monthlyReportsTable" class="display">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Bullying Type</th>
                            <th>Name of Suspects</th>
                            <th>Bullying Behaviors</th>
                            <th>Total Reports</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monthlyBullyingReports as $monthName => $monthlyReport)
                            <tr>
                                <td>{{ $monthName }}</td>
                                @if ($monthlyReport)
                                    <td>{{ $monthlyReport->bullying_type }}</td>
                                    <td>{{ $monthlyReport->name_of_suspects }}</td>
                                    <td>{{ $monthlyReport->bully_behaviors }}</td>
                                    <td>{{ $monthlyReport->total }}</td>
                                @else
                                    <td colspan="4" class="no-data">No reports for this month.</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @include('admin.adminFooter')
    </main>

    <!-- JavaScript -->
    @include('admin.adminJs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>

    <script>
        $(document).ready(function () {
            // DataTables Initialization with Buttons Configuration
            $('#monthlyReportsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Export to Excel',
                        className: 'btn btn-success',
                        filename: 'monthly_reports_excel',
                    },
                    {
                        extend: 'pdfHtml5',
                        text: 'Export to PDF',
                        className: 'btn btn-danger',
                        filename: 'monthly_reports_pdf',
                    },
                ],
                // Add any additional DataTable options here
            });
        });
    </script>
</body>

</html>
