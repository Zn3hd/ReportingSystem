<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;
use App\Models\MonthlyReport;


class HomeController extends Controller
{public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
    
            if ($usertype == 'user') {
                return view('dashboard');
            } else if ($usertype == 'admin') {
                // Retrieve the total number of users and pending reports
                $totalUsers = User::count(); // Assuming you have a User model
                $pendingReports = Reports::where('status', 'pending')->count(); // Assuming you have a Reports model
    
                return view('admin.adminhome', compact('totalUsers', 'pendingReports'));
            } else {
                return redirect()->back();
            }
        }
    }

    public function userReportSummary()
    {
         // Use eager loading to load reports along with the user
    $user = Auth::user()->load('reports');

    // Access the reports using $user->reports
    
    // Return the view
    return view('user.reportSummary', ['userReports' => $user->reports]);

    }

    public function UserReportForm()
    {
        return view('user.UserReportForm');
    }
    public function storeReport(Request $request)
{
    // Assuming the user is authenticated
    $user = Auth::user();

    // Create a new report with user_id automatically set
    $report = $user->reports()->create($request->all());

    // Rest of your code...
}
public function adminBody()
{
    $totalUsers = User::count();
    $userStatuses = User::select('name', 'status')->get();

    // Fetch monthly reports
    $monthlyReports = MonthlyReport::all(); // Modify this query based on your database structure
    
    return view('admin.adminBody', [
        'totalUsers' => $totalUsers,
        'userStatuses' => $userStatuses,
        'monthlyReports' => $monthlyReports,
        // Add other data as needed
    ]);
}
}