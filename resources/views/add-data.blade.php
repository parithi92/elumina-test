@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('addData')}}">
    @csrf
    <label>First Name</label>
    <input type="text" class="form-control" name="fname" value=""></br>
    <label>Last Name</label>
    <input type="text" name="lname" value=""></br>
    <label>Email</label>
    <input type="email" name="email"></br>
    <label>Date Of Birth</label>
    <input type="date" name="dob"></br>
    <button type="submit">Add</button>
</form>
@endsection