@if ($project->exists)
  <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
    @method('PUT')
  @else
   <form action="{{ route('admin.projects.store') }}" method="POST">
@endif

@csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $project->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @else
                    <div class="text-muted">Inserisci il Nome</div>
                @enderror
            </div>    
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="url" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $project->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                 @else
                    <div class="text-muted">Inserisci l'url dell'immagine</div>
                 @enderror  
                </div>    
            </div>
        </div>  
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="description" class="form-label">Contenuto</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10">{{ old('description', $project->description) }}"</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror 
            </div>
        </div> 
    </div> 
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.projects.index')}}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left me-2"></i>Indietro</a>    
        <button type="submit" class="btn btn-success"><i class="fas fa-floppy-disk me-2"></i>Salva</button>    
    </div>   
  </form>