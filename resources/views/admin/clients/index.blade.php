@extends('templates.main')

@section('content')
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="me-auto align-self-center">Clients</h1>
            <a class="btn btn-sm btn-success align-self-center" href="{{ route('admin.clients.create')}}" role="button">Create New Client</a>
        </div>
    </div>

    <div class="card">
        <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">Client</th>
                <th scope="col">Contact</th>
                <th scope="col">Email</th>
                <th scope="col">Free Agent #Id</th>
                <th scope="col" class="text-center">No. Recurring Profiles</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td><a href="{{ route('admin.clients.show', $client) }}">{{$client->company}}</a></td>
                    <td>{{$client->firstname}} {{$client->lastname}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->free_agent_id}}</td>
                    <td class="text-center">{{$client->clientPaymentProfile->count()}}</td>
                    <td>
                        <div class="d-flex flex-column">
                            <a class="btn btn-sm btn-success" href="{{ route('admin.clients.show', $client) }}" role="button">View Client</a>
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.client-payments.create', ['id' => $client->id])}}" role="button">Create Client Payment Record</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.clients.edit', $client->id)}}" role="button">Edit Client</a>
                            <button type="button" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault(); 
                            document.getElementById('delete-client-form-{{$client->id}}').submit()">
                                Delete Client
                            </button>
                            <form id="delete-client-form-{{$client->id}}" action="{{ route('admin.clients.destroy', $client->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method("DELETE")
                            </form>
                        </div>
                    </td>
                  </tr>
                  
                @endforeach
           
            </tbody>
          </table>
          {{ $clients->links()}}
    </div>
@endsection