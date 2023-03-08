@extends('layouts.app')
@section('title', 'Projects')
    
@section('content')
<header class="d-flex align-items-center justify-content-between">
    <h1 class="mt-5">Projects</h1>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-success mt-5"><i class="fas fa-plus me-2"></i>Crea nuovo</a>
</header>
<hr>
<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Creato</th>
          <th scope="col">Aggiornato</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @forelse($projects as $project)
        <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->name }}</td>
            <td>{{ $project->created_at }}</td>
            <td>{{ $project->updated_at }}</td>
            <td class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-small btn-info"><i class="fas fa-eye"></i></a>
                <a class="btn btn-warning ms-2 text-white" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fas fa-pencil"></i></a>
                <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="delete-form" data-name="progetto">
                  @csrf
                  @method('DELETE')
                  <button class=" ms-2 btn btn-small btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                </form>
            </td>
          </tr>
        @empty
        <tr>
            <th scope="row" colspan="5" class="text-center">Non ci sono progetti</th>
        </tr>
        @endforelse
       
       
      </tbody>
</table>
@endsection