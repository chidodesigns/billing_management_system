@extends('templates.main')

@section('content')
    <h1>Reset Password</h1>
    <form method="POST" action="{{ route('password.email')}}">
        @csrf 
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" aria-describedby="email" name="email" value="{{ old('email')}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Get Password Reset Link</button>
    </form>
@endsection
