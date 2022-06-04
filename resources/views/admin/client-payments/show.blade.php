@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <div class="row mb-2">
        @php
            $total = 0;
        @endphp
        <div class="col-md-6">
            <div class="card">
                <h4 class="text-center">Services For Client</h4>
            </div>
            @foreach ($service_payment_records as $record)
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Service:</strong>
                                {{ $record->service_type_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Domain:</strong>
                                <a href="{{ $record->domain }}">{{ $record->domain }}</a>
                            </li>
                            <li class="list-group-item">
                                <strong>Registration Date:</strong>
                                {{ $record->registration_date }}
                            </li>
                            @isset($record->renewal_date)
                                <li class="list-group-item">
                                    <strong>Renewal Date:</strong>
                                    {{ $record->renewal_date }}
                                </li>
                            @endisset
                            <li class="list-group-item">
                                <strong>Amount:</strong>
                                £ {{ $record->amount }}
                                @php
                                    $total += $record->amount;
                                @endphp
                            </li>
                            @isset($record->notes)
                                <li class="list-group-item">
                                    <strong>Notes:</strong>
                                    {{ $record->notes }}
                                </li>
                            @endisset
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-sm btn-primary"
                            href="{{ route('admin.service-payments.edit', $record->id) }}"
                            role="button">Edit
                            Service Payment Record
                        </a>
                        <button type="button" class="btn btn-sm btn-danger"
                            onclick="event.preventDefault();
                                        document.getElementById('delete-service-payments-form-{{ $record->id }}').submit()">
                            Delete Service Payment Record
                        </button>
                        <form id="delete-service-payments-form-{{ $record->id }}"
                            action="{{ route('admin.service-payments.destroy', $record->id) }}"
                            method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            @endforeach
            <div class="card">
                <h4><strong>Total Cost:</strong> £{{ $total }}</h4>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div>
                    <h4 class="text-center">Client Profile:{{ $client_payment_profile->client_name }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Recurrence Type:</strong>
                            {{ $client_payment_profile->recurrence_type }}
                        </li>
                        <li class="list-group-item"><strong>Recurrence Date:</strong>
                            {{ $client_payment_profile->recurrence_date }}
                        </li>
                        <li class="list-group-item"><strong>Invoiced</strong> {{ $client_payment_profile->invoiced }}
                        </li>
                        <li class="list-group-item"><strong>Direct Debit:</strong>
                            {{ $client_payment_profile->direct_debit }}</li>
                        <li class="list-group-item"><strong>Payment Terms:</strong>
                            {{ $client_payment_profile->payment_terms }}
                            Days</li>
                        <li class="list-group-item"><strong>Client Profile:</strong> <a
                                href="{{ route('admin.clients.show', $client_payment_profile->client_id) }}">{{ $client_payment_profile->client_name }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-footer d-flex flex-column">
                    <a class="btn btn-sm btn-warning"
                        href="{{ route('admin.service-payments.create', ['id' => $client_payment_profile->id]) }}"
                        role="button">Add Service Payment Record
                    </a>
                    <a class="btn btn-sm btn-primary"
                        href="{{ route('admin.client-payments.edit', $client_payment_profile->id) }}" role="button">Edit
                        Client Payment Record
                    </a>
                    <button type="button" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault();
                                        document.getElementById('delete-client-payments-form-{{ $client_payment_profile->id }}').submit()">
                        Delete Client Payment Record
                    </button>
                    <form id="delete-client-payments-form-{{ $client_payment_profile->id }}"
                        action="{{ route('admin.client-payments.destroy', $client_payment_profile->id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
