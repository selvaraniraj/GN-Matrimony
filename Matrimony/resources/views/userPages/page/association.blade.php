@extends('layout2.partials.association-header')
@section('main')
    <h2 class="new-association-heading">New Association</h2>
    <hr class="custom-hr">
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

    <form method="POST" action="/associations" enctype="multipart/form-data">
      @csrf
      <h4>Association</h4>
      <hr>
      <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
          <label for="association-name" class="font-weight-bold required-field">Association Name</label>
          <input type="text" class="form-control mb-3" id="association-name" value="{{ old('association_name') }}" name="association_name" placeholder="Enter association name" required>

          <label for="association-phone" class="font-weight-bold required-field">Association Phone Number</label>
          <input type="text" class="form-control mb-3" id="association-phone" name="association_phoneno" value="{{ old('association_phoneno') }}" placeholder="Enter phone number" required>

          <label for="registration-number" class="font-weight-bold required-field">Registration Number</label>
          <input type="text" class="form-control mb-3" id="registration-number" name="association_regno" value="{{ old('association_regno') }}" placeholder="Enter registration number" required>

          <label for="president-name" class="font-weight-bold required-field">Association President</label>
          <input type="text" class="form-control mb-3" id="president-name" name="association_head" value="{{ old('association_head') }}" placeholder="Enter president's name" required>
          <input type="text" class="form-control mb-3" id="president-phone" name="president_number" value="{{ old('president_number') }}" placeholder="Enter president's phone number" required>

          <label for="secretary-name" class="font-weight-bold required-field">Association Secretary</label>
          <input type="text" class="form-control mb-3" id="secretary-name" name="secretary" value="{{ old('secretary') }}" placeholder="Enter secretary's name" required>
          <input type="text" class="form-control mb-3" id="secretary-phone" name="secretary_number" value="{{ old('secretary_number') }}" placeholder="Enter secretary's phone number" required>

          <label for="treasurer-name" class="font-weight-bold required-field">Association Treasurer</label>
          <input type="text" class="form-control mb-3" id="treasurer-name" name="treasurer" value="{{ old('treasurer') }}" placeholder="Enter treasurer's name" required>
          <input type="text" class="form-control mb-3" id="treasurer-phone" name="treasurer_number" value="{{ old('treasurer_number') }}" placeholder="Enter treasurer's phone number" required>

          <label for="treasurer-email" class="font-weight-bold required-field">Email</label>
          <input type="email" class="form-control mb-3" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
        </div>

        <!-- Right Column -->
        <div class="col-md-6">
          <label for="username" class="font-weight-bold required-field">Username</label>
          <input type="text" class="form-control mb-3" id="username" name="username" value="{{ old('username') }}" placeholder="Enter username" required>

          <label for="password" class="font-weight-bold required-field">Password</label>
          <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Enter password" required>

          <label for="confirm_password" class="font-weight-bold required-field">Confirm Password</label>
          <input type="password" class="form-control mb-3" id="confirm_password" name="password_confirmation" placeholder="Confirm your password" required>

          <label for="state" class="font-weight-bold required-field">State</label>
          <select class="form-control mb-3" id="state" name="state" required>
            <option value="">Select a state</option>
            <option value="State1" {{ old('state') == 'State1' ? 'selected' : '' }}>State 1</option>
            <option value="State2" {{ old('state') == 'State2' ? 'selected' : '' }}>State 2</option>
          </select>

          <label for="city-district" class="font-weight-bold required-field">City/District</label>
          <select class="form-control mb-3" id="city-district" name="city" required>
            <option value="">Select city/district</option>
            <option value="City1" {{ old('city') == 'City1' ? 'selected' : '' }}>City 1</option>
            <option value="City2" {{ old('city') == 'City2' ? 'selected' : '' }}>City 2</option>
          </select>

          <label for="taluk" class="font-weight-bold required-field">Taluk</label>
          <select class="form-control mb-3" id="taluk" name="taluk" required>
            <option value="">Select taluk</option>
            <option value="Taluk1" {{ old('taluk') == 'Taluk1' ? 'selected' : '' }}>Taluk 1</option>
            <option value="Taluk2" {{ old('taluk') == 'Taluk2' ? 'selected' : '' }}>Taluk 2</option>
          </select>

          <label for="village-name" class="font-weight-bold required-field">Village Name</label>
          <input type="text" class="form-control mb-3" id="village-name" name="village" value="{{ old('village') }}" placeholder="Enter village name" required>

          <label for="address" class="font-weight-bold required-field">Address</label>
          <textarea class="form-control mb-3" id="address" name="address" rows="3" placeholder="Enter address" required>{{ old('address') }}</textarea>

          <label for="logo" class="font-weight-bold required-field">Logo</label>
          <input type="file" class="form-control mb-3" id="logo" name="image" required>
        </div>
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="save-button">Save</button>
      </div>
    </form>
  

    @include('layout2.partials.association-footer')

</body>
</html>
@endsection