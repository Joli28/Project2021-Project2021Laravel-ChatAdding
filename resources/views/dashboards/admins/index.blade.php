@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')

    <div class="row">
    <div class="col-11" style="margin-top:20px">
        <h1 class="float-left" style="padding-left:60px ">Employee</h1>
        <a class="btn btn-sm btn-success float-right" style="margin-top:10px;" href="{{route ('admin.create')}}" role="button">Create User</a>
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
                        <a class="btn btn-sm btn-primary" href="{{route ('admin.edit', $user->id)}}" role="button">Edit</a>

                        {{-- <button type="button" class="btn btn-sm btn-danger" 
                        onclick="event.preventDefault(); 
                        document.getElementById('delete-user-{{ $user->id }}').submit()"> 
                        Delete </button>
                        <form id="delete-user-{{ $user->id }}" action="{{ route ('admin.destroy', $user->id) }}" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>     --}}

                        <a class="btn btn-sm btn-danger" href="{{url ('admin.destroy', $user->id)}}" onclick="return confirm('Are you sure you want to delete?')" role="button">Delete </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection