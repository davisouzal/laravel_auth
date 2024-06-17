<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resource</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Resource</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('resources.update', $resource->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $resource->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" value="{{ $resource->date }}">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</body>
</html>
