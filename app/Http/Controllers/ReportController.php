<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function userReportSummary()
    {
        // Use eager loading to load reports along with the user
        $user = Auth::user()->load('reports');

        // Access the reports using $user->reports

        // Return the view
       
    return view('user.reportSummary', [
        'reports' => $user->reports,
        'verificationMessage' => 'Your verification status message here',
  ]);
    }
    
    public function adminDashboard()
    {
        $verifiedReports = Reports::where('status', 'verified')->get();
        $unverifiedReports = Reports::where('status', 'pending')->get();

        $reportSummary = [
            'Verified' => $verifiedReports->count(),
            'Pending' => $unverifiedReports->count(),
            // Add more statuses as needed
        ];

        return view('admin.dashboard', [
            'verifiedReports' => $verifiedReports,
            'unverifiedReports' => $unverifiedReports,
            'reportSummary' => $reportSummary,
        ]);
    }

    public function adminUserReports(User $user)
    {
        $userReports = $user->reports;
        return view('admin.userReports', ['userReports' => $userReports, 'user' => $user]);
    }

    public function index(Request $request)
{
    $search = $request->input('search', '');

    $reports = Reports::where(function ($query) use ($search) {
        if (!empty($search)) {
            $query->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%');
            // Add more conditions if needed
        }
    })->paginate(8); // You can adjust the number of items per page as needed

    return view('reports.index', compact('reports', 'search'));
}

    public function incidentReportForm() {
        return view('reports.incidentReportForm');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'report_date_time' => 'required|date',
        'incident_date_time' => 'required|date',
        'first_name' => 'required|string',
        'middle_name' => 'string|nullable',
        'last_name' => 'required|string',
        'incident_location' => 'required|string',
        'nature_of_incident' => 'required|string',
        'incident_details' => 'required|string',
        'suspect_charges' => 'required|string',
        'arrested_relation' => 'required|string',
        'name_of_victims' => 'string',
        'bullying_type' => 'array',
        'bullying_type.*' => 'string|distinct',
        'result_in_injury' => 'in:Yes,No',
        'reported_to_nurse' => 'in:Yes,No',
        'reported_to_police' => 'in:Yes,No',
        'bully_behaviors' => 'array',
        'bully_behaviors.*' => 'string|distinct',
        'Description' => 'required|string',
        'physical_evidence' => 'string',
        'file_upload' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,mp4|max:4096', // Adjust max size as needed
    ]);
   

    // Handle file upload
    if ($request->hasFile('file_upload')) {
        $file = $request->file('file_upload');
        $path = $file->store('uploads', 'public');
        $data['file_path'] = $path;
    }

    // Convert arrays to comma-separated strings
    $data['bullying_type'] = implode(',', $data['bullying_type']);
    $data['bully_behaviors'] = implode(',', $data['bully_behaviors']);

    // Set default status
    $data['status'] = 'pending';

    // Create a new report
    $newReport = Auth::user()->reports()->create($data);

    // Check the usertype and redirect accordingly
    if (Auth::user()->usertype == 'admin') {
        return redirect(route('report.index'))->with('success', 'Report created successfully');
    } else {
        return redirect(route('user.reportSummary'))->with('success', 'Report created successfully');
    }
}
   public function verify(Reports $report)
   {
    $report->update(['status' => 'verified']);
    // You can add any additional logic here, such as sending notifications, etc.
    return redirect()->back()->with('success', 'Report verified successfully.');
   }
   public function reject(Reports $report)
   {
    $report->update(['status' => 'rejected']);
    // You can add any additional logic here, such as sending notifications, etc.
    return redirect()->back()->with('success', 'Report rejected.'); }
   
    public function edit(Reports $report)
    {
        // Check if the authenticated user is the owner of the report
        if (auth()->user()->id !== $report->user_id) {
            abort(403, 'Unauthorized'); // Or you can redirect to a custom error page
        }

        return view('reports.edit', compact('report'));
    }
public function update(Reports $report, Request $request) {
    if (auth()->user()->id !== $report->user_id) {
        abort(403, 'Unauthorized'); // Or you can redirect to a custom error page
    }
    
    $data = $request->validate([
        'report_date_time' => 'required|date',
        'incident_date_time' => 'required|date',
        'first_name' => 'required|string',
        'middle_name' => 'string|nullable',
        'last_name' => 'required|string',
        'incident_location' => 'required|string',
        'nature_of_incident' => 'required|string',
        'incident_details' => 'required|string',
        'suspect_charges' => 'required|string',
        'arrested_relation' => 'required|string',
        'name_of_victims' => 'string',
        'bullying_type' => 'array',
        'bullying_type.*' => 'string|distinct',
        'result_in_injury' => 'in:Yes,No',
        'reported_to_nurse' => 'in:Yes,No',
        'reported_to_police' => 'in:Yes,No',
        'bully_behaviors' => 'array',
        'bully_behaviors.*' => 'string|distinct',
        'Description' => 'required|string',
        'physical_evidence' => 'string',
        'file_upload' => 'nullable',
        
    ]);
    $data['bullying_type'] = implode(',', $data['bullying_type']);
    $data['bully_behaviors'] = implode(',', $data['bully_behaviors']);
    $data['status'] = 'pending';
      $report ->update($data);
      return redirect()->route('report.index')
            ->with('success', 'Report updated successfully');
    }
public function delete(Reports $report) {
    $report->delete();
    $reports = Reports::all();
    return view('reports.index', ['reports' => $reports])->with('success', 'Reports deleted successfully');
}
// ReportController.php

public function overallReportSummary()
{
    try {
        $reportSummary = Reports::select('status', \DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        \Log::info('Report Summary: ' . print_r($reportSummary, true));

        return view('admin.overall', ['reportSummary' => $reportSummary]);
    } catch (\Exception $e) {
        \Log::error('Error fetching report summary: ' . $e->getMessage());
        return view('admin.overall', ['reportSummary' => []]);
    }
}


public function markSolved(Reports $report)
{
    $report->update(['status' => 'solved']);
    return redirect()->back()->with('success', 'Report marked as solved successfully.');
}

public function markUnsolved(Reports $report)
{
    $report->update(['status' => 'unsolved']);
    return redirect()->back()->with('success', 'Report marked as unsolved successfully.');
}
public function handleFileUpload(Request $request)
{
    $request->validate([
        'file_upload' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,gif,mp4|max:4096',
    ]);

    if ($request->hasFile('file_upload')) {
        $file = $request->file('file_upload');
        $path = $file->store('uploads', 'public');

        // Assuming the authenticated user has a current report being created or updated
        $currentReport = auth()->user()->reports()->latest()->first();

        if ($currentReport) {
            // Update the file_path column for the current report
            $currentReport->update(['file_path' => $path]);

            return redirect()->back()->with('status', 'File uploaded successfully.');
        }
    }

    return redirect()->back()->withErrors(['file_upload' => 'File upload failed.']);
}


}


