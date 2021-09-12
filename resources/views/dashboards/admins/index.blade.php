@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')
<!-- 
    <div class="row">
    <div class="col-11" style="margin-top:20px">
        <h1 class="float-left" style="padding-left:60px ">Employee</h1>
        <a class="btn btn-sm btn-success float-right" style="margin-top:10px;" href="" role="button">Create User</a>
     </div>
    </div>

    
    <div class="card" style="margin:30px">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->picture }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="" role="button">Edit</a>

                        {{-- <button type="button" class="btn btn-sm btn-danger" 
                        onclick="event.preventDefault(); 
                        document.getElementById('delete-user-{{ $user->id }}').submit()"> 
                        Delete </button>
                        <form id="delete-user-{{ $user->id }}" action="" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>     --}}

                        <a class="btn btn-sm btn-danger" href="" onclick="return confirm('Are you sure you want to delete?')" role="button">Delete </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div> -->
    <div class="modal fade" id="AddEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="AddEmployeeForm" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-body">
          <ul class="alert alert-warning d-none" id="save_errorList"></ul>
        <div class="form-group mb-3">
            <label>Id</label>
            <input type="number" name="id" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save changes</button>
      </div>
    </form>

    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Data
                        <a href="" class="btn btn-success btn-sm float-right"  data-toggle="modal" data-target="#AddEmployeeModal">Add Employee</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')

<script>
    $(document).ready(function(){
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('submit', '#AddEmployeeForm', function(e){
            e.preventDefault();

            let formData = new FormData($('#AddEmployeeForm')[0]);

            $.ajax({
                type: "POST",
                url: "admin.dashboard",
                data: formData,
                dataType: "dataType",
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == 400){

                        $('#save_errorList').html("");
                        $('#save_errorList').removeClass('d-none');
                        $.each(response.errors, function(key, err_value){
                            $('#save_errorList').append('<li>'+err_value+'</li>');
                        });
                    }
                    else if(response.status == 200){
                        $('#save_errorList').html("");
                        $('#save_errorList').removeClass('d-none');
                        this.reset();
                        $('#AddEmployeeModal').modal('hide');
                        alert(response.message);
                    }
                }
            });
        });
    });
</script>
@endsection