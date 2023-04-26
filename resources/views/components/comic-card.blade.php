<div class="card" style="width: 18rem;">
    <img src="{{ Storage::url($comic->img) }}" class="card-img-top" alt="{{ $comic->title }}">
    <div class="card-body">
        <h5 class="card-title-comic">{!! $comic->title !!}</h5>
        <p class="card-text lead text-primary">Inserito da:  {{ $comic->user->name }}</p>
        <p class="card-text">Editor: {!! $comic->editor !!}</p>
        <p class="card-text">Genre: {!! $comic->genre !!}</p>
        <p class="card-text">Price: {!! $comic->price !!}</p>
        <p class="card-text">Abstract: {!! Str::limit($comic->abstract, 18) !!}</p>
        <p class="card-text">Release: {!! Str::limit($comic->release_year, 18) !!}</p>
        <div class="d-flex">
            <a href="{{ route('comic.show', $comic) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
            <a href="{{ route('comic.edit', $comic) }}" class="btn btn-warning mx-2"><i class="fa-solid fa-pen-to-square"></i></a>           
            <form method="post" action="{{ route('comic.delete', $comic) }}" >
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">
                    <i class="fa-solid fa-bucket"></i>
                </button>
            </form>
        </div>
    </div>
</div>