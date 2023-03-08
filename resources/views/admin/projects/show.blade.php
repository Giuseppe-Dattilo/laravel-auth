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
    <div><strong>Creato: </strong><time>{{ $project->created_at }}</time><strong class="ms-3"> Ultima modifica:
        </strong><time>{{ $project->created_at }}</time>
    </div>
</div>
    <hr>
    <div class="d-flex justify-content-end">
        <a class="btn btn-warning me-2 text-white" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fas fa-pencil me-2"></i>Modifica</a>
        <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="delete-form" data-name="progetto">
            @csrf
            @method('DELETE')
            <button class=" me-2 btn btn-small btn-danger" type="submit"><i class="fas fa-trash me-2"></i>Elimina</button>
          </form>
        <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}"><i class="fas fa-arrow-left me-2"></i>Indietro</a>
    </div>
@endsection