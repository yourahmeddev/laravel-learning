<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome Pro v5.10.0 CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/summernote-bs5.css') }}">
</head>

<body>
    {{-- adding create new post here --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto mt-5">
                <h1>Post Title: {{ $post->title }}</h1>
                Post Description: {!! $post->description !!}
                <p>Active Status: {{ $post->is_active == 1 ? 'Yes' : 'No' }}</p>
                <p>Publish Status: {{ $post->is_publish == 1 ? 'Yes' : 'No' }}</p>
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
