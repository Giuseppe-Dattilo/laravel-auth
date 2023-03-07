@extends('layouts.app')
@section('title', 'Projects')
    
@section('content')
<header>
    <h1 class="my-5">Projects</h1>
</header>
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
            <td>
                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-small btn-info"><i class="fas fa-eye"></i></a>
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