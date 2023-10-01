@extends('employee.layout')
@section('content')
 
<div class="card" style="margin-top: 5%">
  <div class="card-header">Employees Page</div>
  <div class="card-body">
      
      <form action="{{ url('employee') }}" method="post">
        {!! csrf_field() !!}
        <label>First Name</label></br>
        <input type="text" name="first_name" id="first_name" class="form-control" required></br>
        <label>Last Name</label></br>
        <input type="text" name="last_name" id="last_name" class="form-control" required></br>
        <label>Company</label></br>
        <select class="form-select" name="company" aria-label="Default select example" required>
          @foreach($companies as $item)
          <option>{{ $item->company_name }}</option>
          @endforeach
        </select><br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control" required></br>
        <label>Phone</label></br>
        <input type="number" name="phone" id="phone" class="form-control" maxlength = "11" 
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        onkeydown="javascript: return event.keyCode == 69 ? false : true" required/></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection