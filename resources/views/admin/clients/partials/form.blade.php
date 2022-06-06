@csrf
<div class="mb-3">
    <label for="company" class="form-label">Client Company*</label>
    <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" aria-describedby="company"
        name="company" value="{{ old('company') }}@isset($client) {{ $client->company }} @endisset">
    @error('company')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="free_agent_id" class="form-label">Free Agent Id</label>
    <input type="text" class="form-control @error('free_agent_id') is-invalid @enderror" id="free_agent_id" aria-describedby="free_agent_id"
        name="free_agent_id" value="{{ old('free_agent_id') }}@isset($client) {{ $client->free_agent_id }} @endisset">
    @error('free_agent_id')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="firstname" class="form-label">Client Firstname*</label>
    <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" aria-describedby="firstname"
        name="firstname" value="{{ old('firstname') }}@isset($client) {{ $client->firstname }} @endisset">
    @error('firstname')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="lastname" class="form-label">Client Lastname*</label>
    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" aria-describedby="lastname"
        name="lastname" value="{{ old('lastname') }}@isset($client) {{ $client->lastname }} @endisset">
    @error('lastname')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Client Email address*</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email"
        name="email" value="{{ old('email') }}@isset($client) {{ $client->email }} @endisset">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<div class="mb-3">
    <label for="telephone" class="form-label">Client Telephone</label>
    <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" aria-describedby="telephone"
        name="telephone" value="{{ old('telephone') }}@isset($client) {{ $client->telephone }} @endisset">
    @error('telephone')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Submit</button>
