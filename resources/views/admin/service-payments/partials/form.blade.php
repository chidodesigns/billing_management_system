@csrf
<div class="mb-3">
    <input type="hidden" class="form-control" id="service_payment_record_id" name="service_payment_record_id" value="{{$client_payment_profile->id}}">
</div>
<div class="mb-3">
    <label for="service_id" class="form-label">Service Type</label>
    <select class="form-select" aria-label="service_id" name="service_id" id="service_id">
        @isset($services)
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->service_type_name}}</option>
            @endforeach
        @endisset
    </select>
</div>
<div class="mb-3">
    <label for="domain" class="form-label">Domain</label>
    <input type="text" class="form-control" id="domain"
        aria-describedby="Domain" name="domain">
    @error('domain')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="registration_date" class="form-label">Registration Date</label>
    <input type="date" class="form-control" id="registration_date"
        aria-describedby="Registration Date" name="registration_date">
    @error('registration_date')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="renewal_date" class="form-label">Renewal Date</label>
    <input type="date" class="form-control" id="renewal_date"
        aria-describedby="Registration Date" name="renewal_date">
    @error('renewal_date')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="amount" class="form-label">Amount (£)</label>
    <input type="text" class="form-control" id="amount"
        aria-describedby="Registration Date" name="amount">
    @error('amount')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="notes" class="form-label">Notes</label>
    <textarea class="form-control" aria-label="With textarea" rows="7" cols="50" name="notes"
        id="notes"></textarea>
</div>
<button type="submit" class="btn btn-primary">Create Service Payment Record</button>