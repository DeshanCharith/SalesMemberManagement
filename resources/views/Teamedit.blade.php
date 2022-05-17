@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Sales Representative:</div>

                <div class="card-body">
                   

                    <form method="post" action="{{ route('team.update', $team->id) }}">
                        @csrf
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" name="id" class="form-control" placeholder="Enter post title" required value="{{ $team->id }}" >
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
                        <div class="form-group">
                          <label>Joined date</label>
                          <input type="text" name="joined_date" class="form-control" placeholder="Enter post title" required value="{{ $team->joined_date }}">
                          <div class="form-group">
                          <label>Current routes</label>
                          <input type="text" name="current_routes" class="form-control" placeholder="Enter post title" required value="{{ $team->current_routes	 }}">
                        </div>
                        <div class="form-group">
                          <label>Comment</label>
                          <input type="text" name="comment" class="form-control" placeholder="Enter post title" required value="{{ $team->comment }}">
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
