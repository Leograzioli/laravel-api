@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-8">

                <h2 class="text-center my-5">All Project Types</h2>


                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Categories</th>
                            <th scope="col">Post Number</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <th>
                                    <form id="type-{{ $type->id }}"
                                        action="{{ route('admin.types.update', $type->slug) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="text" value="{{ old('name', $type->name) }}"
                                            class="form-control  fw-bold" id="name" name="name">
                                    </form>
                                </th>

                                <td>{{ count($type->projects) }} </td>

                                <td class="d-flex">
                                    <button form="type-{{ $type->id }}"
                                        href=" {{ route('admin.types.update', $type->slug) }}" class="btn btn-warning me-1">
                                        Edit Type
                                    </button>

                                    <a href=" {{ route('admin.types.show', $type->slug) }}" class="btn btn-primary me-1">
                                        Posts
                                    </a>
                                    
                                    <form class="me-1" action="{{ route('admin.types.destroy', $type->slug) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    <form class="input-group mt-4" action="{{ route('admin.types.store') }}" method="POST">
                        @csrf
    
                        <input type="text" placeholder="Add a new category" class="form-control" id="name"
                            name="name">
                        <button class="btn btn-primary">ADD!</button>
    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
