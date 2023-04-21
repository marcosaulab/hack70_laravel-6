<form class="container" method="post" action="{{ route('comic.update', $comic) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="mb-3 col-12 col-md-6">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $comic->title }}">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control" name="editor" value="{{ $comic->editor }}">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="genre" class="form-label">Genre</label>
            <input type="text" class="form-control" name="genre" value="{{ $comic->genre }}" >
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="img" class="form-label">Img</label>
            <div class="d-flex">
                <input type="file" class="form-control w-50" name="img">
                <img src="{{ Storage::url($comic->img) }}" style="width: 80px">
            </div>
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="number" class="form-control" name="release_year" value="{{ $comic->release_year }}">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" min="0" max="100" step="0.1" value="{{ $comic->price }}">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="abstract" class="form-label">Abstract</label>
            <textarea name="abstract" class="form-control" cols="30" rows="10">{{ $comic->abstract }} </textarea>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>