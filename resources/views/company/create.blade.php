@extends('company.layout')
@section('content')
 
<div class="card" style="margin-top: 5%">
  <div class="card-header">Company Page</div>
  <div class="card-body">
      
      <form action="{{ url('company') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Company Name</label></br>
        <input type="text" name="company_name" id="company_name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <label>Logo</label></br>
        <input type="file" class="form-control" id="logo" name="logo" @error('logo') is-invalid @enderror>
        @error('logo')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror<br>
        <label>Website</label></br>
        <input type="text" name="website" id="website" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>

@endsection