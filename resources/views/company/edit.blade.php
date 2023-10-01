@extends('company.layout')
@section('content')
 
<div class="card" style="margin-top: 5%">
  <div class="card-header">Employee Page</div>
  <div class="card-body">
      
      <form action="{{ url('company/' .$companies->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Company Name</label></br>
        <input type="text" name="first_name" id="first_name" value="{{$companies->company_name}}" class="form-control" required></br>
        <label>Email</label></br>
        <input type="text" name="last_name" id="last_name" value="{{$companies->email}}" class="form-control" required></br>
        <label>Website</label></br>
        <input type="text" name="email" id="email" value="{{$companies->website}}" class="form-control" required></br>
        <label>Logo</label></br>
        <input type="file" class="form-control" id="company" name="company" value="{{$companies->name}}" @error('logo') is-invalid @enderror required>
        @error('logo')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
        @enderror<br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection