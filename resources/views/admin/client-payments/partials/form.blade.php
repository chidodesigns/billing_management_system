@csrf
<div class="mb-3">
    <label for="client_id" class="form-label">Client #Id*</label>
    <input type="text" class="form-control" id="client_id" aria-describedby="Client Id" name="client_id"
        value="@isset($client) {{ $client->id }} @endisset"
        @isset($edit) disabled @endisset>
    @error('client_id')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="client_name" class="form-label">Client Company*</label>
    <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name"
        aria-describedby="Client Name" name="client_name"
        value="@isset($client) {{ $client->company }} @endisset"
        @isset($edit) disabled @endisset>
    @error('client_name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="recurrence_type" class="form-label">Recurrence Type*</label>
    <select class="form-select" aria-label="recurrence_type" name="recurrence_type" id="recurrence_type">
        <option value="Monthly"
            @isset($client_payment_profile) {{ old('recurrence_type', $client_payment_profile->recurrence_type) == 'Monthly' ? 'selected' : '' }} @endisset>
            Monthly</option>
        <option value="Annually"
            @isset($client_payment_profile) {{ old('recurrence_type', $client_payment_profile->recurrence_type) == 'Annually' ? 'selected' : '' }} @endisset>
            Annually</option>
    </select>
</div>
<div class="mb-3">
    <label for="invoiced" class="form-label">Invoiced*</label>
    <select class="form-select" aria-label="invoiced" name="invoiced" id="invoiced">
        <option value="Advance"
            @isset($client_payment_profile) {{ old('invoiced', $client_payment_profile->invoiced) == 'Advance' ? 'selected' : '' }} @endisset>
            Advance</option>
        <option value="Arrears"
        @isset($client_payment_profile) {{ old('invoiced', $client_payment_profile->invoiced) == 'Arrears' ? 'selected' : '' }} @endisset>Arrears</option>
    </select>
</div>
<div class="mb-3">
    <label for="recurrence_date" class="form-label">Recurrence Date*</label>
    <input type="date" id="recurrence_date" name="recurrence_date"
        class="form-control @error('recurrence_date') is-invalid @enderror"
        @isset($client_payment_profile) value="{{ $client_payment_profile->recurrence_date }}" @endisset>
        @error('recurrence_date')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="direct_debit" class="form-label">Collect Payment By Direct Debit*</label>
    <select class="form-select" aria-label="Direct Debit" name="direct_debit" id="direct_debit">
        <option value="Yes"
        @isset($client_payment_profile) {{ old('direct_debit', $client_payment_profile->direct_debit) == 'Yes' ? 'selected' : '' }} @endisset>Yes</option>
        <option value="no" @isset($client_payment_profile) {{ old('direct_debit', $client_payment_profile->direct_debit) == 'No' ? 'selected' : '' }} @endisset>
            No</option>
    </select>
</div>
<div class="mb-3">
    <label for="payment_terms" class="form-label">Payment Terms (Days)*</label>
    <input type="text" class="form-control @error('payment_terms') is-invalid @enderror" id=""
        aria-describedby="Payment Terms" name="payment_terms" id="payment_terms"
        value="{{ old('payment_terms') }}@isset($client_payment_profile) {{ $client_payment_profile->payment_terms }} @endisset">
    @error('payment_terms')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email"
        name="email" value="@isset($client) {{ $client->email }} @endisset"
        @isset($edit) disabled @endisset>
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email_subject" class="form-label">Email Subject</label>
    <input type="email_subject" class="form-control @error('email_subject') is-invalid @enderror" id="email_subject"
        aria-describedby="email_subject" name="email_subject" @isset($edit) disabled @endisset>
    @error('email_subject')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email_message" class="form-label">Email Message</label>
    <textarea class="form-control" aria-label="With textarea" rows="7" cols="50" name="email_message" id="email_message"
        @isset($edit) disabled @endisset></textarea>
</div>

<button type="submit" class="btn btn-primary">Update Payment Record</button>
