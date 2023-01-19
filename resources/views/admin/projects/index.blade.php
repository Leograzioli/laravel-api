@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-4 text-center">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
        </div>

        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <h2 class="text-center mb-5"> All Avaliable Projects:</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Title:</th>
                            <th scope="col">Date:</th>
                            <th scope="col">Actions:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $proj)
                            <tr>
                                <th scope="row">{{ $proj->title }}</th>
                                <td>{{  $proj->created_at }}</td>
                                <td class="d-flex">
                                    <a  href=" {{ route('admin.projects.show', $proj->slug) }}" class="btn btn-primary me-1">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                    <a  href=" {{ route('admin.projects.edit', $proj->slug) }}" class="btn btn-warning me-1">
                                        <i class="fa-solid fa-pen-to-square text-white"></i>
                                    </a>

                                    <form class="me-1" action="{{ route('admin.projects.destroy', $proj->slug) }}" method="POST">
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
                <a href=" {{ route('admin.projects.create') }} " class="btn btn-primary mb-5">Create New Project</a>
            </div>
        </div>
    </div>
@endsection
