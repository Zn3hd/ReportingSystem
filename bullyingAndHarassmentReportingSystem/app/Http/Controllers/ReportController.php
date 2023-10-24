<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;

class ReportController extends Controller
{
    public function index() {
        $reports = Reports::all();
        return view('reports.index',['reports' => $reports]);     
    }

    public function incidentReportForm() {
        return view('reports.incidentReportForm');
    }

    public function store(Request $request) {
      
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
     $newReport = Reports::create($data);

    return redirect(route('report.index')); 
    } 
   
     public function edit(Reports $report) {
    
     return view('reports.editReport', ['report' => $report]); 
  
}
public function update(Reports $report, Request $request) {
    
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
   
      $report ->update($data);
      return redirect(route('report.index'))->with('success', 'reports updated successfully');
}
public function delete(Reports $report) {
    $report->delete();
    $reports = Reports::all();
    return view('reports.index', ['reports' => $reports])->with('success', 'Reports deleted successfully');
}

}