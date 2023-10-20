<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <div> 
        <h1>Reports</h1>

         <div>
            @if(session()->has('success'))
          
            <div>
                {{session('success')}}    
           </div>
           <script>
           @endif
            <table border="1">
         <tr>
            <th> id </th>
            <th> report_date_time </th>
            <th> incident_date_time </th>
            <th> first_name </th>
            <th> middle_name </th>
            <th> last_name </th>
            <th> incident_location </th>
            <th> nature_of_incident </th>
            <th> incident_details </th>
            <th> suspect_charges </th>
            <th> arrested_relation </th>
            <th> name_of_victims </th>
            <th> bullying_type </th>
            <th> result_in_injury </th>
            <th> reported_to_nurse </th>
            <th> reported_to_police </th>
            <th> bully_behaviors </th>
            <th> Description </th>
            <th> physical_evidence </th>
            <th> file_upload </th>
            <th> edit </th>
            <th> delete </th>
          
         </tr>
             @foreach($reports as $report)
         <tr> 
            <td>{{$report->id}}</td>
            <td>{{$report->report_date_time}}</td>
            <td>{{$report->incident_date_time}}</td>
            <td>{{$report->first_name}}</td>
            <td>{{$report->middle_name}}</td>
            <td>{{$report->last_name}}</td>
            <td>{{$report->incident_location}}</td>
            <td>{{$report->nature_of_incident}}</td>
            <td>{{$report->incident_details}}</td>
            <td>{{$report->suspect_charges}}</td>
            <td>{{$report->arrested_relation}}</td>
            <td>{{$report->name_of_victims}}</td>
            <td>{{$report->bullying_type}}</td>
            <td>{{$report->result_in_injury}}</td>
            <td>{{$report->reported_to_nurse}}</td>
            <td>{{$report->reported_to_police}}</td>
            <td>{{$report->bully_behaviors}}</td>
            <td>{{$report->description}}</td>
            <td>{{$report->physical_evidence}}</td>
            <td>{{$report->file_upload}}</td>
            <td>
               <a href = "{{route('report.edit', ['report' => $report ]) }}"> Edit </a>
            </td>
            <td>
            <form method="post" action="{{route('report.delete', ['report'=> $report])}}" >
            @csrf 
            @method('delete')
            <input type="submit" value="Delete">
            </form>
            
            </td>
            
         </tr>
             @endforeach
            </table>
         </div>
</body>
</html>