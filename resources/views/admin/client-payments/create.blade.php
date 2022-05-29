@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
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
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h4 class="text-center mb-4 text-decoration-underline">Create Payment Record</h4>
                <form method="POST" action="{{ route('admin.client-payments.store') }}">
                    @include('admin.client-payments.partials.form')
                </form>
            </div>
        </div>

    </div>

@endsection
