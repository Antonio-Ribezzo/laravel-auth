@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{route('admin.project.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- da aggiungere l'old quando si sbaglia a compilare il form per non reinserire i dati di nuovo --}}

                    {{-- project title --}}
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" id="title" name="title" max="25" >
                    {{-- error --}}
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- project description --}}
                    <label for="description" class="form-label">Project Description</label>
                    <textarea class="form-control mb-4 @error('description') is-invalid @enderror" name="description" id="description" rows="3"></textarea>
                    {{-- error --}}
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- project buyer --}}
                    <label for="buyer" class="form-label">Project buyer</label>
                    <input type="text" class="form-control mb-4 @error('buyer') is-invalid @enderror" id="buyer" name="buyer" max="25" >
                    {{-- error --}}
                    @error('buyer')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- cover image --}}
                    <label for="cover_image" class="form-label">Cover Image</label>
                    <input type="file" class="form-control mb-4 @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" >
                    {{-- error --}}
                    @error('cover_image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    {{-- project date --}}
                    <label for="project_date" class="form-label">Project Date</label>
                    <input type="date" class="form-control mb-4" id="project_date" name="project_date" placeholder="Es: 2020-10-06">
                    {{-- error --}}
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- programming languages --}}
                    <label for="programming_languages" class="form-label">Project programming_languages</label>
                    <input type="text" class="form-control mb-4 @error('programming_languages') is-invalid @enderror" id="programming_languages" name="programming_languages" max="25">
                    {{-- error --}}
                    @error('programming_languages')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    {{-- project link --}}
                    <label for="link" class="form-label">Project Link</label>
                    <textarea class="form-control mb-4 @error('link') is-invalid @enderror" name="link" id="link" rows="3"></textarea>
                    {{-- error --}}
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                   

                    <button type="submit" class="d-block btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection