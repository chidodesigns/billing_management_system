@extends('templates.main')

@section('content')
    <h1>Create New Client</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.clients.store') }}">
            @include('admin.clients.partials.form')
        </form>
    </div>
@endsection
