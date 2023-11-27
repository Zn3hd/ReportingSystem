<!-- resources/views/_report-details.blade.php -->

<div class="report-detail">
    <span class="{{ $report->status == 'verified' ? 'verified' : 'unverified' }}">{{ $report->status }}</span>

    @if($report->status == 'pending')
        <form method="post" action="{{ route('report.verify', ['report' => $report]) }}">
            @csrf
            <button type="submit" class="btn btn-success">Verify</button>
        </form>

        <form method="post" action="{{ route('report.reject', ['report' => $report]) }}">
            @csrf
            <button type="submit" class="btn btn-danger">Reject</button>
        </form>

    @else
       
        @include('mark-solved-unsolved', ['report' => $report])
    @endif

    <div class="report-info">
        <strong>Report ID:</strong> {{ $report->id }}<br>
        <strong>Date and Time:</strong> {{ $report->report_date_time }}<br>
        <strong>First Name:</strong> {{ $report->first_name }}<br>
        <strong>Middle Name:</strong> {{ $report->middle_name }}<br>
        <strong>Last Name:</strong> {{ $report->last_name }}<br>
        <strong>Incident Location:</strong> {{ $report->incident_location }}<br>
        <strong>Nature of Incident:</strong> {{ $report->nature_of_incident }}<br>
        <strong>Incident Details:</strong> {{ $report->incident_details }}<br>
        <strong>Suspect Charges:</strong> {{ $report->suspect_charges }}<br>
        <strong>Arrested Relation:</strong> {{ $report->arrested_relation }}<br>
        <strong>Name of Victims:</strong> {{ $report->name_of_victims }}<br>
        <strong>Bullying Type:</strong> {{ $report->bullying_type }}<br>
        <strong>Result in Injury:</strong> {{ $report->result_in_injury }}<br>
        <strong>Reported to Nurse:</strong> {{ $report->reported_to_nurse }}<br>
        <strong>Reported to Police:</strong> {{ $report->reported_to_police }}<br>
        <strong>Bully Behaviors:</strong> {{ $report->bully_behaviors }}<br>
        <strong>Description:</strong> {{ $report->description }}<br>
        <strong>Physical Evidence:</strong> {{ $report->physical_evidence }}<br>
        <strong>File Upload:</strong> {{ $report->file_upload }}<br>

      
    </div>
</div>
