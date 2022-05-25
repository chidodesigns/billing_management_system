@extends('templates.main')

@section('content')
    <h1>Edit User</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.clients.update', $client->id) }}">
            @method('PATCH')
            @include('admin.clients.partials.form')
        </form>
    </div>
@endsection