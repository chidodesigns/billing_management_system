@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <h1>Create New Service</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.services.store') }}">
            @include('admin.services.partials.form')
        </form>
    </div>
@endsection
