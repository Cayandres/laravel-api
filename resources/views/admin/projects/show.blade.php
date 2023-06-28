@extends('layouts.app')

@section('content')
    <div class="card text-center">
        <div class="card-body">
            <img class="w-25" src="{{  asset('storage/' . $project->image_path)}}" alt="{{ $project->name }}">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <a href="{{ route('admin.project.index') }}" class="btn btn-primary">Torna a Progetti</a>
        </div>
    </div>
@endsection
