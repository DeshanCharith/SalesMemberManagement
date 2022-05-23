@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
           
            <a href="{{ route('home')}}" class="btn btn-sm btn-primary">Add New</a>

            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Current Routes</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($teams as $team)
                  <tr>
                    <th scope="row">{{ $team->id }}</th>
                    <td>{{ $team->name }}</td>
                    <td style="max-width:500px">{{ $team->email }}</td>
                    <td style="max-width:500px">{{ $team->telephone }}</td>
                    <td style="max-width:500px">{{ $team->current_routes }}</td>
                    <td>
                    <a class="btn btn-sm btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">View</a>
                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('team.delete', $team->id) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>          
              <div style="float:right;">
                  {{ $teams->links() }}
              </div>

        </div>
    </div>
</div>



 <!-- Bootstrap model use for view details -->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">View Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View member</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form > 
                        <div class="form-group">
                          <label>ID</label>
                          <input type="text" name="id" class="form-control" placeholder="Enter post title" required value="{{ $team->id }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter post title" required value="{{ $team->name }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Enter post title" required value="{{ $team->email }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Telephone</label>
                          <input type="text" name="telephone" class="form-control" placeholder="Enter post title" required value="{{ $team->telephone }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Joined date</label>
                          <input type="text" name="joined_date" class="form-control" placeholder="Enter post title" required value="{{ $team->joined_date }}" disabled>
                          <div class="form-group">
                          <label>Current routes</label>
                          <input type="text" name="current_routes" class="form-control" placeholder="Enter post title" required value="{{ $team->current_routes	 }}" disabled>
                        </div>
                        <div class="form-group">
                          <label>Comment</label>
                          <textarea class="form-control" name="comment" placeholder="Enter post description" rows="6"  placeholder="Enter " disabled>{{ $team->comment }}</textarea>    
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
 <!-- End of Bootstrap model use for view details -->


@endsection
