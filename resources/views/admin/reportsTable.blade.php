<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.adminCss ')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include DataTables Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">

    <!-- Include PDFMake for PDF export -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <!-- Include jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Include DataTables Buttons JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <style>
        #reports-container {
            max-width: 300%;
            height: 100%;
            overflow-x: auto;
            margin-top: 20px;
        }

        #reports-table {
            width: 500%;
            border-collapse: collapse;
        }

        #reports-table th,
        #reports-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            white-space: nowrap; /* Prevent text from wrapping */
            max-width: 200px; /* Set a maximum width for the columns */
            overflow: hidden;
            text-overflow: ellipsis; /* Display ellipsis (...) when content overflows */
        }

        #reports-table th {
            background-color: #3498db;
            color: white;
        }

        #reports-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    @include('admin.adminNavbar')

    @include('admin.adminSettings')

    @include('admin.adminSidebar')

    <div class="content-wrapper">
        <div id="reports-container">
            <table id="reports-table" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date and Time</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Incident Location</th>
                        <th>Nature of Incident</th>
                        <th>Incident Details</th>
                        <th>Suspect Charges</th>
                        <th>Arrested Relation</th>
                        <th>Name of Victims</th>
                        <th>Name of Suspects</th>
                        <th>Bullying Type</th>
                        <th>Result in Injury</th>
                        <th>Reported to Nurse</th>
                        <th>Reported to Police</th>
                        <th>Bully Behaviors</th>
                        <th>Description</th>
                        <th>Physical Evidence</th>
                        <th>File Upload</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->report_date_time }}</td>
                            <td>{{ $report->first_name }}</td>
                            <td>{{ $report->middle_name }}</td>
                            <td>{{ $report->last_name }}</td>
                            <td>{{ $report->incident_location }}</td>
                            <td>{{ $report->nature_of_incident }}</td>
                            <td>{{ $report->incident_details }}</td>
                            <td>{{ $report->suspect_charges }}</td>
                            <td>{{ $report->arrested_relation }}</td>
                            <td>{{ $report->name_of_victims }}</td>
                            <td>{{ $report->name_of_suspects }}</td>
                            <td>{{ $report->bullying_type }}</td>
                            <td>{{ $report->result_in_injury }}</td>
                            <td>{{ $report->reported_to_nurse }}</td>
                            <td>{{ $report->reported_to_police }}</td>
                            <td>{{ $report->bully_behaviors }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ $report->physical_evidence }}</td>
                            <td>{{ $report->file_upload }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Include DataTables scripts -->
     
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
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Include DataTables Buttons JS -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- Include DataTables Buttons CSS (if not included already) -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css">

<!-- Include PDFMake for PDF export (if not included already) -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

   
<script>
    $(document).ready(function () {
        $('#reports-table').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            dom: 'Bfrtip', // Buttons for export
            autoWidth: false, // Disable automatic column width calculation

            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],

            columnDefs: [
                { width: '20px', targets: 0 }, // ID column width
                { width: '150px', targets: [1, 2, 3, 4, 5, 6, 7, 8, 9] }, // Fixed width for some columns
                { width: 'auto', targets: '_all' } // Let other columns expand to fit content
            ]
        });
    });
</script>

</body>

</html>
