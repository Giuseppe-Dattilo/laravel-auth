@extends('layouts.app')
@section('title', 'Projects')
    
@section('content')
<header class="d-flex align-items-center justify-content-between">
    <h1 class="mt-5">Projects</h1>
    <div class="d-flex align-items-center justify-content-end mt-5">
        <form action="{{ route ('admin.projects.index')}}" method="GET">
          <div class="input-group">
            <button class="btn btn-outline-secondary" type="submit">Filtra</button>
            <select class="form-select" name="filter">
              <option selected value="">Tutte</option>
              <option value="published">Pubblicati</option>
              <option value="drafts">Bozze</option>
            </select>
          </div>
        </form>
      <a href="{{ route('admin.projects.create') }}" class="btn btn-success ms-3"><i class="fas fa-plus"></i>Crea nuovo</a>
    </div>
</header>
<hr>
<table class="table table-dark">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Stato</th>
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
            <td>
              <form action="{{ route('admin.projects.toggle', $project->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <button type="submit" class="btn btn-outline py-0">
                  <i class="fas fa-toggle-{{ $project->is_published ? 'on' : 'off' }} {{ $project->is_published ? 'text-success' : 'text-danger' }}"></i>
                </button>
              </form>
            </td>
            <td>{{ $project->created_at }}</td>
            <td>{{ $project->updated_at }}</td>
            <td class="d-flex justify-content-end align-items-center">
                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a class="btn btn-warning ms-2 text-white btn-sm" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fas fa-pencil"></i></a>
                <form method="POST" action="{{ route('admin.projects.destroy', $project->id) }}" class="delete-form" data-name="progetto">
                  @csrf
                  @method('DELETE')
                  <button class=" ms-2 btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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
<hr>
<div class="d-flex justify-content-end">
  @if( $projects->hasPages())
  {{ $projects->links()}}
  @endif
</div>
@endsection