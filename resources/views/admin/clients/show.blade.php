@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>{{ $client->company }}</h1>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Free Agent Id:</strong> {{ $client->free_agent_id }}</li>
                <li class="list-group-item"><strong>Firstname:</strong> {{ $client->firstname }}</li>
                <li class="list-group-item"><strong>Lastname:</strong> {{ $client->lastname }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $client->email }}</li>
                <li class="list-group-item"><strong>Telephone:</strong> {{ $client->telephone }}</li>
            </ul>
        </div>

        <div class="card-footer">
            <a class="btn btn-sm btn-warning" href="{{ route('admin.client-payments.create', ['id' => $client->id]) }}"
                role="button">Create Client Payment Record</a>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.clients.edit', $client->id) }}" role="button">Edit
                Client</a>
            <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                                document.getElementById('delete-client-form-{{ $client->id }}').submit()">
                Delete Client
            </button>
            <form id="delete-client-form-{{ $client->id }}" action="{{ route('admin.clients.destroy', $client->id) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>


    </div>
@endsection
