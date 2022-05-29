@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h1>Client:{{ $client_payment_profile->client_name }}</h1>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Recurrence Type:</strong>
                    {{ $client_payment_profile->recurrence_type }}
                </li>
                <li class="list-group-item"><strong>Recurrence Date:</strong>
                    {{ $client_payment_profile->recurrence_date }}
                </li>
                <li class="list-group-item"><strong>Invoiced</strong> {{ $client_payment_profile->invoiced }}</li>
                <li class="list-group-item"><strong>Direct Debit:</strong> {{ $client_payment_profile->direct_debit }}</li>
                <li class="list-group-item"><strong>Payment Terms:</strong> {{ $client_payment_profile->payment_terms }}
                    Days</li>
                <li class="list-group-item"><strong>Client Profile:</strong> <a
                        href="{{ route('admin.clients.show', $client_payment_profile->client_id) }}">{{ $client_payment_profile->client_name }}</a>
                </li>
            </ul>
        </div>
        <div class="card-footer">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.client-payments.edit', $client_payment_profile->id) }}" role="button">Edit Client Payment Record
            </a>
            <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
                document.getElementById('delete-client-payments-form-{{ $client_payment_profile->id }}').submit()">
                Delete Client Payment Record
            </button>
            <form id="delete-client-payments-form-{{ $client_payment_profile->id }}" action="{{ route('admin.client-payments.destroy', $client_payment_profile->id) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>

    </div>
@endsection