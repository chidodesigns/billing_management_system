@extends('templates.main')

@section('content')
    <h1>Edit New Service</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
            @method('PATCH')
            @include('admin.services.partials.form')
        </form>
    </div>
@endsection