@extends('templates.main')

@section('content')
    
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="me-auto align-self-center">Recurring Profiles</h1>
        </div>
    </div>

    <div class="card">
        <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">Profile ID</th>
                <th scope="col">Client</th>
                <th scope="col">No.Services</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Recurrence</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($client_payment_profiles as $clientPaymentProfile)
                <tr>
                    <td>{{$clientPaymentProfile->id}}</td>
                    <td><a href="{{ route('admin.clients.show', $clientPaymentProfile->client_id) }}">{{$clientPaymentProfile->client_name}}</a></td>
                    <td>{{$clientPaymentProfile->clientPaymentProfileToServicePaymentRecord->count()}}</td>
                    <td>
                        @php
                            $totalCost = 0;
                        @endphp
                        @foreach (Helper::getClientPaymentProfiles($clientPaymentProfile->client_id) as $clientPaymentRecord)
                            @if (Helper::getServicePaymentRecord($clientPaymentRecord->id)->count() > 0)
                                @foreach (Helper::getServicePaymentRecord($clientPaymentRecord->id) as $servicePaymentRecord)
                                    @php $totalCost += $servicePaymentRecord->amount @endphp
                                @endforeach
                                £{{ $totalCost }}
                            @endif
                        @endforeach
                 </td>
                 <td>{{$clientPaymentProfile->recurrence_type}}</td>
                    <td class="d-flex flex-column">
                        <a class="btn btn-sm btn-warning" href="{{ route('admin.service-payments.create', ['id' => $clientPaymentProfile->id]) }}" role="button">Add Service Payment Record
                        </a>
                        <a class="btn btn-sm btn-success" href="{{ route('admin.client-payments.show', $clientPaymentProfile)}}" role="button">View</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.client-payments.edit', $clientPaymentProfile->id)}}" role="button">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$clientPaymentProfile->id}}">
                            Delete
                        </button>
                    </td>
                  </tr>
                  <x-clientpaymentsdeletemodal :clientpaymentprofile="$clientPaymentProfile" />
                @endforeach
           
            </tbody>
          </table>
          {{ $client_payment_profiles->links()}}
    </div>
@endsection