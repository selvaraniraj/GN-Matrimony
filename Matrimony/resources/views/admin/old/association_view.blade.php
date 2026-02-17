@include('admin.admin_header')
@include('admin.admin_left_menu')


    @if(session('success'))
      <div class='alert alert-success'>
        {{ session('success') }}
      </div>
      
    @endif

    @if($errors->any())
    <div class='alert alert-danger'>
      <ul>
        @foreach ($errors->all() as $error)
       <li> {{$error}}</li>
        @endforeach
      </ul>
    </div>
@endif
  <!-- Main Content -->

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1>Service Details</h1>
</div>
<!-- <div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">client</li>
</ol>
</div> -->
</div>
</div>
</section>

  <section class="content">
   
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
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th >SNo</th>
        <th >Association Name</th>
        <th >Association Mobile</th>
        <th >Association Reg No</th>
        <th >Secretary</th>
        <th >Treasurer</th>
        <th >UserName</th>
        <th >Email</th>
        <th >President</th>
        <th >State</th>
        <th >City</th>
        <th >Taluk</th>
        <th >Address</th>
        <th >Village</th>
        <th >Image</th>
        <th >Action</th>
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
            <a href="{{ url('association/update/'.$assoc->id) }}" class="text-danger">
               <i class="fa fa-edit"></i>
            </a> 
            || 
            <a href="#" class="text-danger" onclick="confirmdelete('{{ url('association/'.$assoc->id.'/delete') }}')">
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
  </section>
  
</div>
    @include('admin.admin_footer')
