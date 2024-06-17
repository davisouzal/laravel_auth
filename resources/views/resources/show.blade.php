<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resource Details</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Resource Details</h1>

        <a href="{{ route('resources.index') }}" class="btn btn-primary mb-3">Back</a>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $resource->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $resource->name }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $resource->date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
