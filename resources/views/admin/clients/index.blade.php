@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="me-auto align-self-center">Clients</h1>
            <a class="btn btn-sm btn-success align-self-center" href="{{ route('admin.clients.create')}}" role="button">Create</a>
        </div>
    </div>

    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Free Agent #Id</th>
                <th scope="col">Company</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td>{{$client->free_agent_id}}</td>
                    <td><a href="{{ route('admin.clients.show', $client) }}">{{$client->company}}</a></td>
                    <td>{{$client->firstname}}</td>
                    <td>{{$client->lastname}}</td>
                    <td>{{$client->email}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.clients.edit', $client->id)}}" role="button">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); 
                        document.getElementById('delete-client-form-{{$client->id}}').submit()">
                            Delete
                        </button>
                        <form id="delete-client-form-{{$client->id}}" action="{{ route('admin.clients.destroy', $client->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                  </tr>
                @endforeach
           
            </tbody>
          </table>
          {{ $clients->links()}}
    </div>
@endsection