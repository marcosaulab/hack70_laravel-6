<div class="card" style="width: 18rem;">
    <img src="{{ Storage::url($comic->img) }}" class="card-img-top" alt="{{ $comic->title }}">
    <div class="card-body">
        <h5 class="card-title-comic">{!! $comic->title !!}</h5>
        <small class="text-primary">Inserito da:  {{ $comic->user->name }}</small>
        <p class="card-text d-flex justify-content-between">
            <span>Editor: {!! $comic->editor !!}</span>
            <span>Categoria: {!! $comic->category->name !!}</span>
        </p>   
        <p class="card-text">Abstract: {!! Str::limit($comic->abstract, 18) !!}</p>
        <p class="card-text d-flex justify-content-between">
            <span>Release: {!! $comic->release_year !!}</span>
            <span>Price: {!! $comic->price !!}</span>
        </p>
        <div class="d-flex">
            <a href="{{ route('comic.show', $comic) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
        </div>
    </div>
</div>