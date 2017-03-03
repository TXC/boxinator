<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boxinator</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script type="text/javascript">
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>

<div id="app"></div>

<script src="{{ mix('/js/app.js') }}" type="text/javascript"></script>

</body>
</html>