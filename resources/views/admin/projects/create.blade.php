@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-8">
                <form action=" {{ route('admin.projects.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-2">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" id="title" name="title"
                            class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="type">Project Type:</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">no type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)> {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        @foreach ($techs as $tech)
                            <input type="checkbox" name="techs[]" id="tech-{{$tech->id}}" value="{{ $tech->id }}" @checked(in_array($tech->id, old('techs', [])))>
                            <label for="tech-{{$tech->id}}" class="me-2">{{ $tech->name }}</label>
                        @endforeach
                    </div>

                    <div class="mb-4 ">
                        <label for="description" class="form-label">Description:</label>
                        <textarea type="text" id="description" name="description"
                            class="form-control @error('description') is-invalid @enderror">
                        {{ old('description') }}</textarea>
                        @error('description')
                            <div>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover_image">Image:</label>
                        <input type="file" id="cover_image" name="cover_image" class="form-control">
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
