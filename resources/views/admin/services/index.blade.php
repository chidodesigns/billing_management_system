@extends('templates.main')

@section('content')
<div class="row">
    <div class="col-12 d-flex">
        <h1 class="me-auto align-self-center">Services</h1>
        <a class="btn btn-sm btn-success align-self-center" href="{{ route('admin.services.create')}}" role="button">Create New Service </a>
    </div>
</div>

<div class="card">
    <table class="table align-middle">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Service Name</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <th scope="row">{{ $service->id }}</th>
                <td>{{$service->service_type_name}}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.services.edit', $service->id)}}" role="button">Edit</a>
                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$service->id}}">
                        Delete
                    </button>
                </td>
              </tr>
              <x-servicesdeletemodal :service="$service"/>
            @endforeach
       
        </tbody>
      </table>
      {{ $services->links()}}
</div>
@endsection