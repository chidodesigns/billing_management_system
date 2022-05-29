@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <h1>Edit Client Payment Record</h1>
    <div class="card">
        <form method="POST" action="{{ route('admin.client-payments.update', $client_payment_profile->id ) }}">
            @method('PATCH')
            @include('admin.client-payments.partials.form', ['edit' => true])
        </form>
    </div>
@endsection
