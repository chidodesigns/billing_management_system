@extends('templates.main')

@section('content')
    
    <div class="row">
        <div class="col-12 d-flex">
            <h1 class="me-auto align-self-center">Client Payment Profiles</h1>
            <a class="btn btn-sm btn-success align-self-center" href="{{ route('admin.client-payments.create')}}" role="button">Create</a>
        </div>
    </div>

    <div class="card">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#Id</th>
                <th scope="col">Client Name</th>
                <th scope="col">Recurrence Type</th>
                <th scope="col">Recurrance Date</th>
                <th scope="col">Invoiced</th>
                <th scope="col">Direct Debit</th>
                <th scope="col">Payment Terms (Days)</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($client_payment_profiles as $clientPaymentProfile)
                <tr>
                    <td>{{$clientPaymentProfile->id}}</td>
                    <td><a href="{{ route('admin.clients.show', $clientPaymentProfile->client_id) }}">{{$clientPaymentProfile->client_name}}</a></td>
                    <td>{{$clientPaymentProfile->recurrence_type}}</td>
                    <td>{{$clientPaymentProfile->recurrence_date}}</td>
                    <td>{{$clientPaymentProfile->invoiced}}</td>
                    <td>{{$clientPaymentProfile->direct_debit}}</td>
                    <td>{{$clientPaymentProfile->payment_terms}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.client-payments.edit', $clientPaymentProfile->id)}}" role="button">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); 
                        document.getElementById('delete-client-payment-form-{{$clientPaymentProfile->id}}').submit()">
                            Delete
                        </button>
                        <form id="delete-client-payment-form-{{$clientPaymentProfile->id}}" action="{{ route('admin.client-payments.destroy', $clientPaymentProfile->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                  </tr>
                @endforeach
           
            </tbody>
          </table>
          {{ $client_payment_profiles->links()}}
    </div>
@endsection