@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Client: {{ $client->company }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Free Agent Id:</strong> {{ $client->free_agent_id }}</li>
                        <li class="list-group-item"><strong>Firstname:</strong> {{ $client->firstname }}</li>
                        <li class="list-group-item"><strong>Lastname:</strong> {{ $client->lastname }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $client->email }}</li>
                        <li class="list-group-item"><strong>Telephone:</strong> {{ $client->telephone }}</li>
                    </ul>
                </div>

                <div class="card-footer">
                    <a class="btn btn-sm btn-warning"
                        href="{{ route('admin.client-payments.create', ['id' => $client->id]) }}" role="button">Create
                        Client Payment Record</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.clients.edit', $client->id) }}"
                        role="button">Edit
                        Client</a>
                    <button type="button" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault();
                                                document.getElementById('delete-client-form-{{ $client->id }}').submit()">
                        Delete Client
                    </button>
                    <form id="delete-client-form-{{ $client->id }}"
                        action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                @foreach (Helper::getClientPaymentProfiles($client->id) as $clientPaymentRecord)
                <div class="card mb-3">
                    <ul class="list-group list-group-flush">
                        <h6 class="my-5 text-center text-decoration-underline">Client Payment Record</h6>
                        <li class="list-group-item"><strong>Recurrence Type:</strong>
                            {{ $clientPaymentRecord->recurrence_type }}
                        </li>
                        <li class="list-group-item"><strong>Recurrence Date:</strong>
                            {{ $clientPaymentRecord->recurrence_date }}
                        </li>
                        <li class="list-group-item"><strong>Invoiced</strong> {{ $clientPaymentRecord->invoiced }}
                        </li>
                        <li class="list-group-item"><strong>Direct Debit:</strong>
                            {{ $clientPaymentRecord->direct_debit }}</li>
                        <li class="list-group-item"><strong>Payment Terms:</strong>
                            {{ $clientPaymentRecord->payment_terms }}
                            Days</li>  
                            <div class="my-3">
                                <a class="btn btn-sm btn-primary"
                                href="{{ route('admin.client-payments.edit', $clientPaymentRecord->id) }}" role="button">Edit
                                Client Payment Record
                            </a>
                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                                document.getElementById('delete-client-payments-form-{{ $clientPaymentRecord->id }}').submit()">
                                Delete Client Payment Record
                            </button>
                            <form id="delete-client-payments-form-{{ $clientPaymentRecord->id }}"
                                action="{{ route('admin.client-payments.destroy', $clientPaymentRecord->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            </div>
                     
                        @if (Helper::getServicePaymentRecord($clientPaymentRecord->id)->count() > 0)
                        <h6 class="my-5 text-center text-decoration-underline">Service Payment Record</h6>
                        @foreach (Helper::getServicePaymentRecord($clientPaymentRecord->id) as $servicePaymentRecord)
                            <li class="list-group-item">
                                <strong>Service Type Name: </strong>
                                {{$servicePaymentRecord->service_type_name}}
                            </li>
                            <li class="list-group-item">
                                <strong>Domain: </strong>
                                {{$servicePaymentRecord->domain}}
                            </li>
                            <li class="list-group-item">
                                <strong>Registration Date: </strong>
                                {{$servicePaymentRecord->registration_date}}
                            </li>
                            <li class="list-group-item">
                                <strong>Renewal Date: </strong>
                                {{$servicePaymentRecord->renewal_date}}
                            </li>
                            <li class="list-group-item">
                                <strong>Amount: </strong>
                                {{$servicePaymentRecord->amount}}
                            </li>
                            <li class="list-group-item">
                                <strong>Notes: </strong>
                                {{$servicePaymentRecord->notes}}
                            </li>
                            <div class="my-3">
                                <a class="btn btn-sm btn-primary"
                                href="{{ route('admin.service-payments.edit', $servicePaymentRecord->id) }}" role="button">Edit
                                Service Payment Record
                            </a>
                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="event.preventDefault();
                                                document.getElementById('delete-service-payments-form-{{ $servicePaymentRecord->id }}').submit()">
                                Delete Service Payment Record
                            </button>
                            <form id="delete-service-payments-form-{{ $servicePaymentRecord->id }}"
                                action="{{ route('admin.service-payments.destroy', $servicePaymentRecord->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            </div>
                        @endforeach  
                        @endif 
                                       
                    </ul>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection
