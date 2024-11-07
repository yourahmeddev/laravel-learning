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
    <link rel="stylesheet" href="{{ asset('assets/toastr.min.css') }}">
</head>

<body>
    {{-- adding create new post here --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto mt-5">
                <h1>View Posts</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
                {{-- tables start --}}
                @if (count($posts) > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Post ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Active</th>
                                <th scope="col">Publish</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ Str::limit($post->description, 10, '...') }}</td>
                                    <td>{{ $post->is_active == 1 ? 'Yes' : 'No' }}</td>
                                    <td>{{ $post->is_publish == 1 ? 'Yes' : 'No' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            class="btn btn-warning d-inline-block">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-primary d-inline-block">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if ($post->trashed())
                                            <a href="{{ route('posts.soft-delete', $post->id) }}"
                                                class="btn btn-dark d-inline-block">
                                                <i class="fas fa-undo"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('posts.destroy', $post->id) }}" class="d-inline-block"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-danger mt-3">No Post Found</h3>
                @endif
                {{-- tables end --}}
                {{ $posts->render() }}
            </div>
        </div>
    </div>
    {{-- adding create new post end --}}
    <script src="{{ asset('assets/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/parsley.min.js') }}"></script>
    <script>
        $('#create-post').parsley();
    </script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <script>
        @if (Session::has('alert-success'))
            toastr["success"]("{{ session::get('alert-success') }}")
        @endif
        @if (Session::has('alert-info'))
            toastr["info"]("{{ session::get('alert-info') }}")
        @endif
        @if (Session::has('alert-danger'))
            toastr["error"]("{{ session::get('alert-danger') }}")
        @endif
        @if (Session::has('alert-message'))
            toastr["info"]("{{ session::get('alert-message') }}")
        @endif
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
