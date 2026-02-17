@extends ('layout2.partials.association-header')
@section('main')
  <!-- Main Content -->
  
    <h2 class="new-association-heading"> Activity Report</h2>
    <hr class="custom-hr">

    <div class="container-fluid">
      <div class="row">
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <span class="close" data-dismiss="modal" aria-label="Close">&times;</span>
              <div id="details" class="text-center mt-20"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Mobile Request Details</h3>
            </div>
           
            <div class="card-body">
            @if(session('success'))
            <div class='alert alert-success'>
            {{session('success')}}
  </div>
  @endif
              <!-- Inside the table-responsive div -->
<div class="col-md-12 table-responsive">
  <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
    <thead>
      <tr>
        <th>SNo</th>
        <th>Member Id</th>
        <th>Profile Id</th>
        <th>Message</th>   
        <th>Request Accept</th>  
      </tr>
    </thead>
    <tbody>
    @foreach($memberactivitylog as $member)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <a href='#' class='fetchdetails' data-id='{{$member->member_id}}'
                  data-type='member'>
                  {{ $member->member_id }}</a></td>
                <td>
                  <a href='#' class='fetchdetails' data-id='{{$member->profile_id}}' 
                  data-type='profile'>
                  {{ $member->profile_id }}</a></td>
                <td>{{ $member->message }}</td>
                <td>
                  
                    @if(isset($member->acceptmessage))
                        {{ $member->acceptmessage }}
                    @else
                        No accept message yet!
                    @endif
                </td>
            </tr>
        @endforeach
          
    </tbody>
  </table>
</div>

            </div>
          </div>
        </div>
      </div>
    </div>
  
  
    @include('layout2.partials.association-footer')
</body>
</html>

@endsection