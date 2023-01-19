@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h2 class="mt-5 text-center">{{ $project->title }}</h2>
                <small>{{ $project->created_at }}</small>
                @if ($project->type)
                    <h5 class="mt-2">{{ $project->type->name }}</h5>
                @endif
                    @forelse ($project->technologies as $tech)
                        <span>#{{ $tech->name }}</span>
                    @empty
                        <span>no tech</span>
                        
                    @endforelse
                <p class="mt-4">{{ $project->description }}</p>
                <img class="w-50" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            </div>
        </div>
    </div>
@endsection
