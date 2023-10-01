@extends('employee.layout')
@section('content')
 
<div class="card" style="margin-top: 5%">
  <div class="card-header">Employee Page</div>
  <div class="card-body">
      
      <form action="{{ url('employee/' .$employees->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>First Name</label></br>
        <input type="text" name="first_name" id="first_name" value="{{$employees->first_name}}" class="form-control"></br>
        <label>Last Name</label></br>
        <input type="text" name="last_name" id="last_name" value="{{$employees->last_name}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$employees->email}}" class="form-control"></br>
        <label>Company</label></br>
        <input type="text" name="company" id="company" value="{{$employees->company}}" class="form-control"></br>
        <label>Phone</label></br>
        <input type="number" name="phone" id="phone" value="{{$employees->phone}}" class="form-control" maxlength = "11" 
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        onkeydown="javascript: return event.keyCode == 69 ? false : true"/></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@endsection