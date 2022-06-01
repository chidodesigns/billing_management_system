@extends('templates.main')

@section('content')
<div class="my-3">
    <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
</div>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h1>{{$client_payment_profile->client_name}}</h1>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flex">
                    <li class="list-group-item"><strong>Recurrence Type:</strong> {{$client_payment_profile->recurrence_type}}</li>
                    <li class="list-group-item"><strong>Recurrence Date:</strong> {{$client_payment_profile->recurrence_date}}</li>
                    <li class="list-group-item"><strong>Invoiced:</strong> {{$client_payment_profile->invoiced}}</li>
                    <li class="list-group-item"><strong>Direct Debit:</strong> {{$client_payment_profile->direct_debit}}</li>
                    <li class="list-group-item"><strong>Payment Terms:</strong> {{$client_payment_profile->payment_terms}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h4 class="text-center mb-4 text-decoration-underline">Create Service Payment Record</h4>
            <form method="POST" action="{{route('admin.service-payments.store')}}">
                @include('admin.service-payments.partials.form', ['edit' => false])
            </form>
        </div>
    </div>
</div>
@endsection

