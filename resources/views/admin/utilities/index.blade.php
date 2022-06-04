@extends('templates.main')

@section('content')
    <h1>Utilities</h1>
    <div class="card">
        <h4 class="my-5">Export</h4>
        <div class="card">
            <a href="{{route('admin.clients.export')}}" class="btn btn-lg btn-success mb-5" type="button">Export Clients</a>
            <a href="{{route('admin.clientpayments.export')}}" class="btn btn-lg btn-success mb-5" type="button">Export Client Payment Records</a>
            <a href="{{route('admin.servicepayments.export')}}" class="btn btn-lg btn-success mb-5" type="button">Export Service Payment Records</a>
        </div>
    </div>
@endsection