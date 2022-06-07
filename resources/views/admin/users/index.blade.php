@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="me-auto align-self-center">Users</h1>
            <a class="btn btn-sm btn-success align-self-center" href="{{ route('admin.users.create')}}" role="button">Add User</a>
        </div>
    </div>

    <div class="card">
        <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a class="btn btn-sm btn-success" href="{{ route('admin.users.show', $user->id) }}" role="button">View User</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id)}}" role="button">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                            Delete
                        </button>
                    </td>
                  </tr>
                  <x-userdeletemodal :user="$user" />
                @endforeach
           
            </tbody>
          </table>
          {{ $users->links()}}
    </div>

@endsection

