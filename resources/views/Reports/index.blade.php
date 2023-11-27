
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminCss ')

    <style>
    .table-container {
      overflow-x: auto;
      max-height: 700px;
      overflow-y: auto;
      max-width: 1300px; /* Adjust the height according to your design */
     
</style>

 
  </head>
  <body>
    
   
      <!-- partial:partials/_navbar.html -->
    @include('admin.adminNavbar')
      <!-- partial -->
    @include('admin.adminSettings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
    @include('admin.adminSidebar')
        <!-- partial -->
   



     <div> 
   
         <div>
            @if(session()->has('success'))
          
            <div>
                {{session('success')}}    
           </div>
        @endif
        <div class="table-container">
      
       
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Reports</h4>

        <form action="{{ route('report.index') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name or location" value="{{ $search }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                        
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
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
            <th>status</th>
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
            </thead>
            <tbody>
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
            <td>{{$report->status}}</td>

            <td>{{$report->result_in_injury}}</td>
            <td>{{$report->reported_to_nurse}}</td>
            <td>{{$report->reported_to_police}}</td>
            <td>{{$report->bully_behaviors}}</td>
            <td>{{$report->description}}</td>
            <td>{{$report->physical_evidence}}</td>
            <td>{{$report->file_upload}}</td>
           
                  <td>
                    <a href="{{ route('report.edit', ['report' => $report]) }}">Edit</a>
                  </td>
                  <td>
                    <form method="post" action="{{ route('report.delete', ['report'=> $report]) }}" >
                      @csrf 
                      @method('delete')
                      <input type="submit" value="Delete">
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $reports->appends(['search' => $search])->links() }}
        </div>
      </div>
    </div>
 



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
  </body>
</html>