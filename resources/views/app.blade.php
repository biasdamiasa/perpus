<!doctype html>
<html lang="{{ str_replace ('_', '-', app()->getLocale()) }}"></html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}" />

    <title>SiPERPUS</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}" type="text/css">
</head>

<body>
    <div id="app" class="container-fluid"></div>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>

</html>