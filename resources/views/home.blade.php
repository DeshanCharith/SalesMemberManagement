
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Sales Representative:</div>

                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('team.create') }}">
                        @csrf
                       
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter " required >
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter" required >
                        </div>
                        <div class="form-group">
                          <label>Telephone</label>
                          <input type="text" name="telephone" class="form-control" placeholder="Enter " required >
                        </div>

                        
                        <div class="form-group">
                          <label>Joined date</label>
                          <input type="text" name="joined_date" class="form-control" placeholder="Enter post title" required >
                
                        </div>
                          <div class="form-group">
                          <label>Current routes</label>
                          <input type="text" name="current_routes" class="form-control" placeholder="Enter" required >
                        </div>
                        <div class="form-group">
                          <label>Comment</label>
                          <input type="text" name="comment" class="form-control" placeholder="Enter " required >
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
@endsection


