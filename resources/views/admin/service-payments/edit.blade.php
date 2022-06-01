@extends('templates.main')

@section('content')
<div class="my-3">
    <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
</div>
<h1 class="text-center mb-4 text-decoration-underline">Edit Service Payment Record</h1>
<div class="card">
    <form method="POST" action="{{route('admin.service-payments.update', $service_payment_record->id)}}">
        @method('PATCH')
        @include('admin.service-payments.partials.form', ['edit' => true])
    </form>
</div>
@endsection