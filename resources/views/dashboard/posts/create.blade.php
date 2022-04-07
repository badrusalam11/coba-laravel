@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

<div class="col-lg-8">

    <form method="post" action="/dashboard/posts" enctype="multipart/form-data" class="mb-5">
        @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
        <div class="invalid-feedback">
            @error('title')
                {{ $message }} 
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug')is-invalid @enderror" value="{{ old('slug') }}" id="slug" name="slug" readonly required>
         <div class="invalid-feedback">
            @error('slug')
                {{ $message }} 
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id" aria-label="Default select example" required>
            @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>
        <img src="" alt="" class="img-preview img-fluid col-sm-5 mb-2" >
        <input class="form-control @error('image')is-invalid @enderror" name="image" type="file" id="image" onchange="previewImage()">
        <div class="invalid-feedback">
            @error('image')
                {{ $message }} 
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Body</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body') }}" required>
        <trix-editor input="body"></trix-editor>
    </div>
     <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</div>


<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/dashboard/posts/checkSlug?title='+title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
    })
    // console.log(data.slug);

    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault;
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection