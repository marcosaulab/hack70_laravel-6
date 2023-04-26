<x-layout>

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <h1>Lista dei Comics inseriti da {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">

            
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Editor</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comics as $comic)
                        <tr>
                            <th scope="row">{{ $comic->id }}</th>
                            <td>{{ $comic->title }}</td>
                            <td>{{ $comic->genre }}</td>
                            <td>{{ $comic->editor }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('comic.show', $comic) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('comic.edit', $comic) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="post" action="{{ route('comic.delete', $comic) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa-solid fa-bucket"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            

        </div>
    </div>

</x-layout>