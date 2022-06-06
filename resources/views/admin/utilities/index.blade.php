@extends('templates.main')

@section('content')
    <h1>Utilities</h1>
    <div class="card">
        <h4 class="my-5">Export</h4>
            <div class="div d-flex">
                <span style="width: 25%;">Clients</span> <a href="{{route('admin.clients.export')}}" class="btn btn-sm btn-success mb-5 ms-1" type="button">Export</a>
            </div>
            <div class="div d-flex">
                <span style="width: 25%;">Recurring Profiles</span> <a href="{{route('admin.clientpayments.export')}}" class="btn btn-sm btn-success mb-5 ms-1" type="button">Export</a>
            </div>
            <div class="d-flex">
                <span style="width: 25%;">Service Payment Records</span> <a href="{{route('admin.servicepayments.export')}}" class="btn btn-sm btn-success ms-1 mb-5" type="button">Export</a>
            </div>
            
        </div>
@endsection