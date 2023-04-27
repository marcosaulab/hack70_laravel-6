<form class="container" method="post" action="{{ route('comic.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row my-5">
        <div class="mb-3 col-12 col-md-6">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control" name="editor">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="category" class="form-label">Categoria</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="formats" class="form-label">Formati</label>
            <select name="formats[]" class="form-control" multiple>
                @foreach ($formats as $format)
                    <option value="{{ $format->id }}">{{ $format->name }}</option>              
                @endforeach
            </select>
            <small class="text-warning fs-italic">Ctrl + click per selezionare più elementi</small>
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="img" class="form-label">Img</label>
            <input type="file" class="form-control" name="img">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="release_year" class="form-label">Release Year</label>
            <input type="number" class="form-control" name="release_year">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" min="0" max="100" step="0.1">
        </div>
        <div class="mb-3 col-12 col-md-6">
            <label for="abstract" class="form-label">Abstract</label>
            <textarea name="abstract" class="form-control" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>