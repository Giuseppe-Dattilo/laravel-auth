@extends('layouts.app')
@section('title', $project->name)

@section('content')
<header>
    <h1 class="my-5">{{ $project->name }}</h1>
</header>
<div class="clearfix">
    @if($project->image)
        <img class="me-2 float-start" src="{{ $project->image }}" alt="{{ $project->name }}">
    @endif
    <p>{{ $project->description }}</p>
    <div><strong>Creato: </strong><time>{{ $project->created_at }}</time></div>
    <div><strong>Ultima modifica: </strong><time>{{ $project->created_at }}</time></div>
    <hr>
    <div class="d-flex justify-content-end">
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Indietro</a>
    </div>
</div>
@endsection