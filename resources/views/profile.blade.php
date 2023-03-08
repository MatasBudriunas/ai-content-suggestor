<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    @vite('resources/css/app.css')
    @vite('resources/css/profile.css')
</head>
<body>
@include('navbar')
<div id="profile"></div>

@vite('resources/js/profile.js')
</body>
</html>
