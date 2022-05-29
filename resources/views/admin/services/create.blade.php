@extends('templates.main')

@section('content')
    <h1>Create New Service</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.services.store') }}">
            @include('admin.services.partials.form')
        </form>
    </div>
@endsection