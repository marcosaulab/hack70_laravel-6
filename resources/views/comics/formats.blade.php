<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Lista dei Comics per Formato: <span class="text-success">{{ $formatName }}</span></h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">

            @foreach ($comics as $comic)
                <div class="col-12 col-md-3 my-2">
                    <x-comic-card :comic="$comic" />
                </div>
            @endforeach

        </div>
    </div>

</x-layout>