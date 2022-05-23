@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Sales Representative:</div>

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

                    <form method="post" action="{{ route('team.update', $team->id) }}">
                        @csrf
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" name="id" class="form-control" placeholder="Enter post title" required value="{{ $team->id }}" disabled >
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter post title" required value="{{ $team->name }}">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter post title" required value="{{ $team->email }}">
                        </div>
                        <div class="form-group">
                          <label>Telephone</label>
                          <input type="text" name="telephone" class="form-control" placeholder="Enter post title" required value="{{ $team->telephone }}">
                        </div>
                        <!-- <div class="form-group">
                          <label>Joined date</label>
                          <input type="text" name="joined_date" class="form-control" placeholder="Enter post title" requiredvalidation value="{{ $team->joined_date }}">
                       </div> -->

                       <div class="form-group">
                          <label>Joined date</label>
                        <input type="text"  class="form-control" name="joined_date" {{ Form::text('date', $team->joined_date, array('id' => 'datepicker')) }}
                        </div>
                        
                          <div class="mb-3 mt-3 form-group" style="">
                            <label for="current_routes" class="form-label">Route</label>
                            <select style="" name="current_routes" class="custom-select custom-select-sm form-control" required > 
                                <option selected  value="{{ $team->current_routes }}">{{ $team->current_routes }}</option>
                                <option value="Cloombo 1">Cloombo 1 </option>
                                <option value="Cloombo 2">Cloombo 2</option>
                                <option value="Cloombo 3">Cloombo 3</option>
                                <option value="Cloombo 4">Cloombo 4</option> 
                            </select>
                        </div>

                        <div class="form-group">
                          <label>Comment</label>
                          <textarea class="form-control" name="comment" placeholder="Enter post description" rows="6"  placeholder="Enter "   value="{{ $team->comment }}">{{ $team->comment }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </div>
                       
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
