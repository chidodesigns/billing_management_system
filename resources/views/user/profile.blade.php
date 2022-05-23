@extends('templates.main')

@section('content')
    <h1>Update Profile</h1>
    <form method="POST" action="{{ route('user-profile-information.update')}}">
        @method("PUT")
        @csrf 
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" aria-describedby="name" name="name" value="{{ auth()->user()->name}}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email')is-invalid @enderror" id="email" aria-describedby="email" name="email" value="{{ auth()->user()->email}}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
