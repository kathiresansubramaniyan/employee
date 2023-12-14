@extends('layout')
@section('content')
    <div class="starter-template">
            <div class="row">
                    <div class="col-sm-12">
                    <h1 class="display-3">List</h1>
                    <a href="{{route('employees.create')}}" class="btn btn-primary mb">Add New</a> 
                      <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>DateofBirth</th>
                                <th>Education Qualification</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th>Resume</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>                            
                        </tbody>
                      </table>
                    <div>
                    </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        ajax: "{{ route('employees.index') }}",
        columns: [
            {data: 'employee_id', name: 'id', orderable: true},
            {data: 'firstname', name: 'firstname', orderable: true},
            {data: 'lastname', name: 'lastname', orderable: true},
            {data: 'email', name: 'email', orderable: true},
            {data: 'phone', name: 'phone', orderable: true},
            {data: 'dob', name: 'dob', orderable: false},
            {data: 'education_qualification', name: 'education_qualification', orderable: false},
            {data: 'address', name: 'address', orderable: false},
            {data: 'resume', name: 'resume', orderable: false, searchable: false},
            {data: 'photo', name: 'photo', orderable: false, searchable: false},
            {data: 'actions', name: 'actions', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
@endsection