<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;


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
        
        // Fetch monthly reports (modify the query as needed)
        $currentMonth = now()->format('m');
        $monthlyReports = Reports::whereMonth('created_at', $currentMonth)->get();
    
        $reportSummary = [
            'Verified' => $verifiedReports->count(),
            'Pending' => $unverifiedReports->count(),
        ];
    
        return view('admin.dashboard', [
            'verifiedReports' => $verifiedReports,
            'unverifiedReports' => $unverifiedReports,
            'monthlyReports' => $monthlyReports,
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

    return view('Reports.index', compact('reports', 'search'));
}

    public function incidentReportForm() {
        return view('Reports.incidentReportForm');
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
        'name_of_suspects' => 'string',
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
        'name_of_suspects' => 'string',
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


public function overallReportSummary()
{
    try {
        // Overall statistics
        $overallSummary = Reports::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        // Monthly statistics
        $currentMonth = Carbon::now()->format('m');
        $monthlySummary = Reports::select(DB::raw('count(*) as total'))
            ->whereMonth('created_at', $currentMonth)
            ->groupBy('status')
            ->get();

        // Fetch monthly reports for the last 12 months
        $monthlyBullyingReports = [];
        $highestReportingRate = null;
        $highestSuspectRate = null;
        $highestBehaviorRates = [];

        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->format('F');
            $monthNumber = $month->format('m');

            $monthlyReport = Reports::whereMonth('created_at', $monthNumber)
                ->select(
                    'bullying_type',
                    'name_of_suspects',
                    'bully_behaviors',
                    DB::raw('count(*) as total')
                )
                ->groupBy('bullying_type', 'name_of_suspects', 'bully_behaviors')
                ->orderByDesc('total')
                ->first();

            $monthlyBullyingReports[$monthName] = $monthlyReport;

            // Update highest reporting rate
            if ($monthlyReport && (!$highestReportingRate || $monthlyReport->total > $highestReportingRate->total)) {
                $highestReportingRate = $monthlyReport;
            }

            // Update highest suspect rate
            if ($monthlyReport && (!$highestSuspectRate || $monthlyReport->total > $highestSuspectRate->total)) {
                $highestSuspectRate = $monthlyReport;
            }

            // Update highest behavior rates
            if ($monthlyReport && $monthlyReport->bully_behaviors) {
                $behaviors = explode(',', $monthlyReport->bully_behaviors);
                foreach ($behaviors as $behavior) {
                    if (!isset($highestBehaviorRates[$behavior]) || $monthlyReport->total > $highestBehaviorRates[$behavior]) {
                        $highestBehaviorRates[$behavior] = $monthlyReport->total;
                    }
                }
            }
        }

        // Determine the highest categories
        $highestBullyingTypeCategory = $highestReportingRate ? $highestReportingRate->bullying_type : null;
        $highestSuspectCategory = $highestSuspectRate ? $highestSuspectRate->name_of_suspects : null;
        $highestBehaviorCategory = $highestBehaviorRates ? array_keys($highestBehaviorRates, max($highestBehaviorRates))[0] : null;

        return view('admin.overall', [
            'reportSummary' => $overallSummary,
            'monthlySummary' => $monthlySummary,
            'monthlyBullyingReports' => $monthlyBullyingReports,
            'highestReportingRate' => $highestReportingRate,
            'highestSuspectRate' => $highestSuspectRate,
            'highestBehaviorRates' => $highestBehaviorRates,
            'highestBullyingTypeCategory' => $highestBullyingTypeCategory,
            'highestSuspectCategory' => $highestSuspectCategory,
            'highestBehaviorCategory' => $highestBehaviorCategory,
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching report summary: ' . $e->getMessage());
        return view('admin.overall', [
            'reportSummary' => [],
            'monthlySummary' => [],
            'monthlyBullyingReports' => [],
            'highestReportingRate' => null,
            'highestSuspectRate' => null,
            'highestBehaviorRates' => [],
        ]);
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
public function monthlyBullyingReport()
{
    try {
        // Fetch monthly reports for the last 12 months
        $monthlyBullyingReports = [];
        $highestReportingRate = null;
        $highestSuspectRate = null;
        $highestBehaviorRates = [];

        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i);
            $monthName = $month->format('F');
            $monthNumber = $month->format('m');

            $monthlyReport = Reports::whereMonth('created_at', $monthNumber)
                ->select(
                    'bullying_type',
                    'name_of_suspects',
                    'bully_behaviors',
                    \DB::raw('count(*) as total')
                )
                ->groupBy('bullying_type', 'name_of_suspects', 'bully_behaviors')
                ->orderByDesc('total')
                ->first();

            $monthlyBullyingReports[$monthName] = $monthlyReport;

            // Update highest reporting rate
            if ($monthlyReport && (!$highestReportingRate || $monthlyReport->total > $highestReportingRate->total)) {
                $highestReportingRate = $monthlyReport;
            }

            // Update highest suspect rate
            if ($monthlyReport && (!$highestSuspectRate || $monthlyReport->total > $highestSuspectRate->total)) {
                $highestSuspectRate = $monthlyReport;
            }

            // Update highest behavior rates
            if ($monthlyReport && $monthlyReport->bully_behaviors) {
                $behaviors = explode(',', $monthlyReport->bully_behaviors);
                foreach ($behaviors as $behavior) {
                    if (!isset($highestBehaviorRates[$behavior]) || $monthlyReport->total > $highestBehaviorRates[$behavior]) {
                        $highestBehaviorRates[$behavior] = $monthlyReport->total;
                    }
                }
            }
        }

        // Determine the highest categories
        $highestBullyingTypeCategory = $highestReportingRate ? $highestReportingRate->bullying_type : null;
        $highestSuspectCategory = $highestSuspectRate ? $highestSuspectRate->name_of_suspects : null;
        $highestBehaviorCategory = $highestBehaviorRates ? array_keys($highestBehaviorRates, max($highestBehaviorRates))[0] : null;

        return view('admin.monthlyBullyingReport', [
            'monthlyBullyingReports' => $monthlyBullyingReports,
            'highestReportingRate' => $highestReportingRate,
            'highestSuspectRate' => $highestSuspectRate,
            'highestBehaviorRates' => $highestBehaviorRates,
            'highestBullyingTypeCategory' => $highestBullyingTypeCategory,
            'highestSuspectCategory' => $highestSuspectCategory,
            'highestBehaviorCategory' => $highestBehaviorCategory,
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching monthly bullying report: ' . $e->getMessage());
        return view('admin.monthlyBullyingReport', [
            'monthlyBullyingReports' => [],
            'highestReportingRate' => null,
            'highestSuspectRate' => null,
            'highestBehaviorRates' => [],
        ]);
    }
}
public function reportsTable()
{
    // Fetch all reports for DataTable
    $reports = Reports::all();

    return view('admin.reportsTable', compact('reports'));
}
public function exportExcel()
{
    return Excel::download(new ReportsExport, 'reports.xlsx');
}

public function exportPDF()
{
    $pdf = PDF::loadView('your.pdf.view', ['data' => $yourData]);
    return $pdf->download('reports.pdf');
}
}


