<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Comic: </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">

            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($comic->img) }}" class="img-fluid w-50" alt="{{ $comic->title }}">
            </div>
            <div class="col-12 col-md-6">
                <h2>{!! $comic->title !!}</h2>
                <p class="d-flex justify-content-between">
                    <span class="lead">Genre: {!! $comic->genre !!}</span>
                    <span class="lead">Editor: {!! $comic->editor !!}</span>
                </p>
                <p>
                    Abstract: <br>
                    {!! $comic->abstract !!}
                </p>
                <p class="d-flex justify-content-between">
                    <span class="lead">Year: {!! $comic->release_year !!}</span>
                    <span class="lead">Price: {!! $comic->price !!}</span>
                </p>
            </div>

        </div>
    </div>


</x-layout>