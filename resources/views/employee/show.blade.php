@extends('layout')
@section('content')
<div class="container">  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1>{{$pageTitle}}</h1>
    <div>
    <dl class="row">

      <dt class="col-sm-3">Employee Id:</dt>
      <dd class="col-sm-9">{{ $employee->employee_id }}</dd>

      <dt class="col-sm-3">First Name:</dt>
      <dd class="col-sm-9">{{ $employee->firstname }}</dd>

      <dt class="col-sm-3">Last Name:</dt>
      <dd class="col-sm-9">{{ $employee->lastname }}</dd>

      <dt class="col-sm-3">Email:</dt>
      <dd class="col-sm-9">{{ $employee->email }}</dd>

      <dt class="col-sm-3">Phone:</dt>
      <dd class="col-sm-9">{{ $employee->phone }}</dd>

      <dt class="col-sm-3">DOB:</dt>
      <dd class="col-sm-9">{{ date('d-m-Y',strtotime($employee->dob)) }}</dd>

      <dt class="col-sm-3">Education Qualification:</dt>
      <dd class="col-sm-9">{{ $employee->education_qualification }}</dd>
      
      <dt class="col-sm-3">Address:</dt>
      <dd class="col-sm-9">{{ $employee->address }}</dd>

      <dt class="col-sm-3">Photo:</dt>
      <dd class="col-sm-9">
        @if( !empty( $employee->photo ) )
        <div class="clearfix m-b-sm">
        <img src="{{asset('images/'.$employee->photo)}}" width="150">
        </div>
        @endif
      </dd>
    </dl>
    </div>
    </div>
  </div>
</div>
@endsection