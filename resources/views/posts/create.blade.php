<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
</head>

<body>
    {{-- adding create new post here --}}
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto mt-5">
                {{-- showing errors in laravel start --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- showing errors in laravel end --}}
                <h1>Create New Post</h1>
                                {{-- showing success message on new post creation start --}}
                                @if (Session::has('alert-success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success</strong>{{ session::get('alert-success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                  @endif
                            {{-- showing the success message on new post creation end --}}
                <form method="POST" action="{{ route('posts.store') }}" id="create-post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" required value="{{ old('title') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="password" class="form-control" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Publish</label>
                        <select class="form-select" name="is_publish" required>
                            <option disabled selected>Select Option</option>
                            <option @selected(old('is_publish') == 1) value="1">Yes</option>
                            <option @selected(old('is_publish') == 0) value="0">No</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Active</label>
                        <select class="form-select" name="is_active" required>

                            <option disabled selected>Select Option</option>
                            <option @selected(old('is_active') == 1) value="1">Yes</option>
                            <option @selected(old('is_active') == 0) value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class=" btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    {{-- adding create new post end --}}
    <script src="{{ asset('assets/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/parsley.min.js') }}"></script>
    <script>
        $('#create-post').parsley();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>