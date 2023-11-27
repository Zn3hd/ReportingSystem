<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.UserCss ')
    <style>
        .table-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow-x: auto;
            width: 80%; /* Adjust the width according to your design */
            overflow-y: auto;
            /* Add any other styles you need */
        }

        .main-content {
            max-width: 75%; /* Adjust the width according to your design */
            margin:  auto;
        }

        .table-content {
            max-height: 450px; /* Set the maximum height for the scrollable area */
            overflow-y: auto;
            overflow-x: auto;
            width: 300%
        }

        .status-pending {
            font-weight: bold;
            color: maroon;
        }

        .status-verified {
            font-weight: bold;
            color: green;
        }

        .status-rejected {
            font-weight: bold;
            color: red;
        }
        .status-solved {
            font-weight: bold;
            color: blue;
        }

        .status-unsolved {
            font-weight: bold;
            color: maroon;
        }
        /* Increase font size for better readability */
        .list-group-item {
            font-size: 15px;
            text-align: left;
        }
    </style>
</head>

<body>
    @include('user.UserNavbar')
    @include('user.UserSettings')
    @include('user.UserSidebar')

    <div class="table-container">
        <div class="main-content">
            <h3 class="card-title">Your Report Summary</h3>

            <div class="table-content">
                @if($userReports->count() > 0)
                <ul class="list-group">
                    @foreach($userReports as $report)
                    <li class="list-group-item">
                   
            <strong>Report Date and Time:</strong> {{ $report->report_date_time }}
           <br>
       
            <strong>First Name:</strong> {{ $report->first_name }}
            <br>
      
            <strong>Middle Name:</strong> {{ $report->middle_name }}
            <br>
       
            <strong>Last Name:</strong> {{ $report->last_name }}
            <br>
            <strong>Incident Location:</strong> {{ $report->incident_location }}
            <br>
       
            <strong>Nature of Incident:</strong> {{ $report->nature_of_incident }}
            <br>
       
            <strong>Incident Details:</strong> {{ $report->incident_details }}
            <br>
       
            <strong>Suspect Charges:</strong> {{ $report->suspect_charges }}
            <br>
       
            <strong>Arrested Relation:</strong> {{ $report->arrested_relation }}
            <br>
       
            <strong>Name of Victims:</strong> {{ $report->name_of_victims }}
            <br>
       
            <strong>Bullying Type:</strong> {{ $report->bullying_type }}
            <br>
       
            <strong>Result in Injury:</strong> {{ $report->result_in_injury }}
            <br>
       
            <strong>Reported to Nurse:</strong> {{ $report->reported_to_nurse }}
            <br>
       
            <strong>Reported to Police:</strong> {{ $report->reported_to_police }}
            <br>
       
            <strong>Bully Behaviors:</strong> {{ $report->bully_behaviors }}
            <br>
       
            <strong>Description:</strong> {{ $report->description }}
            <br>
       
            <strong>Physical Evidence:</strong> {{ $report->physical_evidence }}
            <br>
       
            <strong>File Upload:</strong> {{ $report->file_upload }}
            <br>
           
      
                    </li>
                    <!-- Add similar list items for other report details -->

                    <li class="list-group-item">
                        <strong>Status:</strong>
                        <span class="
                            @if($report->status == 'pending') status-pending
                            @elseif($report->status == 'verified') status-verified
                            @elseif($report->status == 'rejected') status-rejected
                            @elseif($report->status == 'solved') status-solved
                            @elseif($report->status == 'unsolved') status-unsolved
                            @endif">
                            {{ $report->status }}
                        </span>
                        @if($report->status == 'verified')
                        <p>Report Verified. Wait for our email to notify you for the assessment.</p>
                        @elseif($report->status == 'rejected')
                        <p>Report Rejected. Please review and resubmit if necessary.</p>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @else
                <p>No reports found for this user.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="spacer">
   
    </div>
    @include('user.UserJs')
</body>


</html>
