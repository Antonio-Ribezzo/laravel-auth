@extends ('layouts.app')

@section('content')
<div class='container d-flex flex-column align-items-center justify-content-center mt-5'>
        <h2 class>{{ $project->title }}</h2>
        <p>{{ $project->description }}</p>
        <h6 class="card-subtitle mb-2 text-body-secondary"><span class="text-decoration-underline">Buyer</span>: {{ $project->buyer }}</h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><span class="text-decoration-underline">Technologies</span>: {{ $project->programming_languages }}</h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><span class="text-decoration-underline">Link</span>:<a href="#" class="ms-1 card-link">{{$project->link}}</a></h6>
</div>
@endsection