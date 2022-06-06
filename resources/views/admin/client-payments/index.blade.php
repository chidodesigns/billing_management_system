@extends('templates.main')

@section('content')
    
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="me-auto align-self-center">Recurring Profiles</h1>
        </div>
    </div>

    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Client Name</th>
                <th scope="col">Recurrence Type</th>
                <th scope="col">Recurrance Date (YYYY/MM/DD)</th>
                <th scope="col">Invoiced</th>
                <th scope="col" class="text-center">Direct Debit</th>
                <th scope="col" class="text-center">Payment Terms (Days)</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($client_payment_profiles as $clientPaymentProfile)
                <tr>
                    <td><a href="{{ route('admin.clients.show', $clientPaymentProfile->client_id) }}">{{$clientPaymentProfile->client_name}}</a></td>
                    <td>{{$clientPaymentProfile->recurrence_type}}</td>
                    <td>{{$clientPaymentProfile->recurrence_date}}</td>
                    <td>{{$clientPaymentProfile->invoiced}}</td>
                    <td class="text-center">{{$clientPaymentProfile->direct_debit}}</td>
                    <td class="text-center">{{$clientPaymentProfile->payment_terms}}</td>
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