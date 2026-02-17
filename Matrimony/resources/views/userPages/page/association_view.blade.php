@extends ('layout2.partials.association-header')
@section('main')
  <!-- Main Content -->
  
    <h2 class="new-association-heading"> Association Report</h2>
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
              <h3 class="card-title">Association Details</h3>
            </div>
           
            <div class="card-body">
            @if(session('success'))
            <div class='alert alert-success'>
            {{session('success')}}
  </div>
  @endif
              <!-- Inside the table-responsive div -->
              <div class="col-md-12">
  <table id="example1" class="table table-bordered table-striped" style="width: 100%; table-layout: fixed;">
    <thead>
      <tr>
        <th style="width: 5%;">SNo</th>
        <th style="width: 17%;">Association Name</th>
        <th style="width: 17%;">Association Mobile</th>
        <th style="width: 17%;">Association Reg No</th>
        <th style="width: 15%;">Secretary</th>
        <th style="width: 15%;">Treasurer</th>
        <th style="width: 15%;">UserName</th>
        <th style="width: 12%;">Email</th>
        <th style="width: 15%;">President</th>
        <th style="width: 10%;">State</th>
        <th style="width: 10%;">City</th>
        <th style="width: 10%;">Taluk</th>
        <th style="width: 15%;">Address</th>
        <th style="width: 10%;">Village</th>
        <th style="width: 14%;">Image</th>
        <th style="width: 10%;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($association as $assoc)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $assoc->association_name }}</td>
          <td>{{ $assoc->association_phoneno }}</td>
          <td>{{ $assoc->association_regno }}</td>
          <td>{{ $assoc->secretary }} - {{ $assoc->secretary_number }}</td>
          <td>{{ $assoc->treasurer_name }} - {{ $assoc->treasurer_number }}</td>
          <td>{{ $assoc->username }}</td>
          <td>{{ $assoc->email }}</td>
          <td>{{ $assoc->association_head }} - {{ $assoc->president_number }}</td>
          <td>{{ $assoc->state }}</td>
          <td>{{ $assoc->city }}</td>
          <td>{{ $assoc->taluk }}</td>
          <td>{{ $assoc->address }}</td>
          <td>{{ $assoc->village }}</td>
          <td>
            @if ($assoc->image)
              <img src="{{ asset($assoc->image) }}" 
                style="width:50px;height:100px;object-fit:contain;" 
                alt="Association Image" />
            @else
              <span>Not Uploaded</span>
            @endif
          </td>
          <td>
            <a href="{{url('association/update/'.$assoc->id)}}" class="text-danger"><i class="fa fa-edit"></i></a> 
            || 
            <a href="#" class="text-danger" 
            onclick="confirmdelete('{{url('association/'.$assoc->id.'/delete')}}')">
            <i class="fa fa-trash"></i>
            </a>
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