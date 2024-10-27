<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create New Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Font awesome Pro v5.10.0 CDN -->
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('assets/parsley.css') }}">
</head>

<body>
    {{-- adding create new post here --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 m-auto mt-5">
                <h1>View Posts</h1>
                {{-- tables start --}}
                @if(count($posts)>0)
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
                        @foreach ($posts  as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->is_active == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->is_publish == 1 ?  'Yes' : 'No' }}</td>
                            <td class="text-center">
                                <a href="" class="btn btn-warning d-inline-block">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="" class="btn btn-primary d-inline-block">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="" class="d-inline-block">
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
    <script src="{{ asset('assets/parsley.min.js') }}"></script>
    <script>
        $('#create-post').parsley();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
