@extends('templates.main')

@section('content')
    <h1>Password Reset</h1>
    <form method="POST" action="{{ url('reset-password')}}">
        @csrf 
        <input type="hidden" name="token" value="{{ $request->token }}">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" aria-describedby="email" name="email" value="{{ $request->email}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password')is-invalid @enderror" id="password" name="password" >
            @error('password')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
