@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <h1>Create New Client</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.clients.store') }}">
            @include('admin.clients.partials.form')
        </form>
    </div>
@endsection
