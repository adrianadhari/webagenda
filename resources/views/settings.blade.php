<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Settings</title>
</head>

<body>
    <div class="container">
        <!-- SIDEBAR -->
        @include('include.sidebar')

        <!-- MAIN -->
        <div class="main">
            @include('include.navbar', ['pageTitle' => 'Settings'])
            @include('include.dropdown')

            <!-- CARDS -->
        </div>

        <script src="{{ asset('js/main.js') }}"></script>
    </div>
</body>

</html>
