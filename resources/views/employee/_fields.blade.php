
<div class="form-group">    
    <label for="employee_id">Employee Id:</label>
    <input type="text" class="form-control" name="employee_id" value="{{  !empty( $employee->employee_id ) ? $employee->employee_id : old('employee_id') }}"/>
</div>

<div class="form-group">    
    <label for="first_name">First Name:</label>
    <input type="text" class="form-control" name="firstname" value="{{  !empty( $employee->firstname ) ? $employee->firstname : old('firstname') }}"/>
</div>

<div class="form-group">    
    <label for="lastname">Last Name:</label>
    <input type="text" class="form-control" name="lastname" value="{{  !empty( $employee->lastname ) ? $employee->lastname : old('lastname') }}"/>
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" name="email" value="{{  !empty( $employee->email ) ? $employee->email : old('email') }}"/>
</div>
<div class="form-group">
        <label for="country">Phone:</label>
        <input type="text" class="form-control" name="phone" value="{{  !empty( $employee->phone ) ? $employee->phone : old('phone') }}"/>
</div>
<div class="form-group">
    <label for="city">DOB:</label>
    <input type="text" class="form-control dob" name="dob" value="{{  !empty( $employee->dob ) ? date('d-m-Y',strtotime($employee->dob)) : old('dob') }}"/>
</div>
<div class="form-group">
    <label for="education_qualification">Education Qualification:</label>
    <input type="text" class="form-control" name="education_qualification" value="{{  !empty( $employee->education_qualification ) ? $employee->education_qualification : old('education_qualification') }}"/>
</div>
<div class="form-group">
    <label for="country">Address:</label>
    <input type="text" class="form-control" name="address" value="{{  !empty( $employee->address ) ? $employee->address : old('address') }}"/>
</div>

<div class="form-group">    
    <label for="photo">Photo:</label>
    <input type="file" class="form-control" name="photo"/>
    @if( !empty( $employee->photo ) )
        <div class="clearfix m-b-sm">
            <img src="{{asset('images/'.$employee->photo)}}" width="150">
        </div>
    @endif
</div>

<div class="form-group">    
    <label for="resume">Resume:</label>
    <input type="file" class="form-control" name="resume"/>
    @if( !empty( $employee->resume ) )
        <div class="clearfix m-b-sm">
            <label>{{$employee->resume}}</label>
        </div>
    @endif
</div>
@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $('.dob').datepicker({
                dateFormat: 'dd-mm-yy'
            });        
        });
    </script>    
@endsection
