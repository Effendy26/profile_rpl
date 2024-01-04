<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deatil Data Guru </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Add any additional stylesheets or custom styles here -->
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: red;
        }
    </style>
</head>

<body class="bg-light">

    <main class="container mt-5 mb-5">
        <div class="card border-0 shadow-sm rounded p-4" style="width: 18rem;">
            <img src="{{ asset('/storage/guru/' . $guru->image) }}" alt="{{ $guru->title }}" class="card-img-top rounded-circle"
                style="width: 150px; margin: 15px auto;">
            <div class="card-body text-center">
                <h2 class="card-title">{{ $guru->title }}</h2>
                <p class="card-text text-muted">{{ $guru->subtitle }}</p>
                <hr>
                <p class="card-text">
                    {!! $guru->content !!}
                </p>
            </div>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Add any additional scripts here -->

</body>

</html>
