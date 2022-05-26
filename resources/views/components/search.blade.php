<form class="d-flex" method="POST" action="{{ route('admin.clients.search') }}">
    @csrf
    <input class="form-control me-2 @error('search_term') is-invalid @enderror" type="search" placeholder="Search Clients"
        aria-label="Search" id="search_term" name="search_term">
    <button class="btn btn-outline-success" type="submit">Search</button>
    @error('search_term')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
</form>
