@csrf
<div class="mb-3">
    <label for="service_type_name" class="form-label">Service Type Name</label>
    <input type="text" class="form-control @error('service_type_name') is-invalid @enderror" id="service_type_name"
        aria-describedby="service_type_name" name="service_type_name"
        value="{{old('service_type_name')}}@isset($service) {{ $service->service_type_name }} @endisset">
    @error('service_type_name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
