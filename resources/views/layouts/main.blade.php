<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boxinator</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>

</head>
<body>



<div class="container">
    <nav class="navbar navbar-default">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="/addbox">Add boxes</a></li>
                <li><a href="/listboxes">List boxes</a></li>
            </ul>
        </div>
    </nav>

    @yield('content')
</div>

</body>
</html>