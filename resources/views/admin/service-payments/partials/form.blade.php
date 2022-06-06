@csrf
@if(!$edit)
<div class="mb-3">
    <input type="hidden" class="form-control" id="client_payment_profile_id" name="client_payment_profile_id" value="{{$client_payment_profile->id}}">
</div>
@endif

@if(!$edit)
<div class="mb-3">
    <label for="service_id" class="form-label">Service Type*</label>
    <select class="form-select" aria-label="service_id" name="service_id" id="service_id">
        @isset($services)
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->service_type_name}}</option>
            @endforeach
        @endisset
    </select>
</div>
@endif

@if ($edit)
    <div class="mb-3">
        <label for="service_type_name">Service Type*</label>
        <input type="text" class="form-control" id="service_type_name" name="service_type_name" value="{{$service_payment_record->service_type_name}}" disabled>
    </div>
@endif

<div class="mb-3">
    <label for="domain" class="form-label">Domain*</label>
    <input type="text" class="form-control @error('domain') is-invalid @enderror" id="domain"
        aria-describedby="Domain" name="domain" value="{{ old('domain') }}@isset($service_payment_record) {{ $service_payment_record->domain }} @endisset">
    @error('domain')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="registration_date" class="form-label">Registration Date*</label>
    <input type="date" class="form-control @error('registration_date') is-invalid @enderror" id="registration_date"
        aria-describedby="Registration Date" name="registration_date" @isset($service_payment_record) value="{{$service_payment_record->registration_date}}" @endisset>
    @error('registration_date')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="renewal_date" class="form-label">Renewal Date*</label>
    <input type="date" class="form-control @error('renewal_date') is-invalid @enderror" id="renewal_date"
        aria-describedby="Registration Date" name="renewal_date"  @isset($service_payment_record) value="{{$service_payment_record->renewal_date}}" @endisset>
    @error('renewal_date')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount"
        aria-describedby="Registration Date" name="amount" value="{{ old('amount') }}@isset($service_payment_record) {{ $service_payment_record->amount }} @endisset">
    @error('amount')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control" aria-label="With textarea" rows="7" cols="50" name="notes"
        id="notes" @error('notes') is-invalid @enderror value="{{ old('notes') }}@isset($service_payment_record) {{ $service_payment_record->notes }} @endisset"></textarea>
</div>
<button type="submit" class="btn btn-primary">
   @if($edit) Update Service Payment Record @endif 
   @if(!$edit) Create Service Payment Record @endif 
</button>