@if (session('status') === true)
    <div class="alert alert-success mt"> {{ session('msg') }} </div>
@endif