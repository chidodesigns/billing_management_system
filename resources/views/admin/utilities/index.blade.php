@extends('templates.main')

@section('content')
    <h1>Utilities</h1>
    <div class="card">
        <h4 class="my-5">Export</h4>
        <div class="card">
            <a href="{{route('admin.clients.export')}}" class="btn btn-lg btn-success" type="button">Export Clients</a>
        </div>
    </div>
@endsection