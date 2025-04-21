<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/main.js') }}" defer></script>
</head>

<body>
    <div role="banner">
        @include('include.navbar')
    </div>
    <div role="navigation">
        @include('include.sidebar')
    </div>
    <main role="main" class="main">
        @yield('content')
    </main>
</body>

</html>
