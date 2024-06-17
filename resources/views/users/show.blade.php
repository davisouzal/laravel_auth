<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">User Details</h1>

        <div class="card">
            <div class="card-header">
                User ID: {{ $user->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">CPF: {{ $user->cpf }}</p>
                <p class="card-text">Phone: {{ $user->phone }}</p>
                <p class="card-text">Matrícula: {{ $user->registration }}</p>
                <p class="card-text">Role: {{ $user->role->name }}</p>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
