@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <h2 class="text-center my-5">{{ $type->name }} Projects:</h2>

            @forelse ($type->projects as $proj)
                <div class="col-8">

                    <div class="card mt-4">
                        <div class="card-body ">
                            <h3 class="card-title text-center">{{ $proj->title }}</h3>
                            <h5 class="card-sub-title mb2 text-muted text-center"> {{ $type->name }}</h5>
                            @foreach ($proj->technologies as $item)
                                <span>#{{ $item->name }}</span>
                            @endforeach

                            <p class="card-text mt-3"> {{ $proj->description }} </p>

                            <div class="d-flex justify-content-center ">
                                <a href="{{ route('admin.projects.show', $proj->slug) }}" class="btn btn-primary">see
                                    post</a>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <h5 class="text-center">No Posts Yet</h5>
            @endforelse
        </div>
    </div>
@endsection
