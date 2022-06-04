@extends('templates.main')

@section('content')
    <div class="my-3">
        <a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Back</a>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="my-3">Name: {{$user->name}}</h4>
            <h4 class="my-3">Email: {{$user->email}}</h4>
        </div>

        <div class="card-footer">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}"
                role="button">Edit
                User</a>
            <button type="button" class="btn btn-sm btn-danger"
                onclick="event.preventDefault();
                                        document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                Delete User
            </button>
            <form id="delete-user-form-{{ $user->id }}"
                action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
@endsection
