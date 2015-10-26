<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <title>LearnTube - Learning Management App</title>
    <meta name="description" content="LearnTube is a learning management app built for learning purposes">

    <!-- Typekit Fonts -->
    <script src="//use.typekit.net/udt8boc.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
@include('includes.navbar')
<div class="container-fluid">
        @include('layouts.partials.alerts')
        @yield('content')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>