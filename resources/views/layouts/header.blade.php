<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CEA</title>

    <!-- Styles -->
    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

    <div class="container">    
        <img class="img-responsive" src="{!! asset('img/Portal_CEA.jpg') !!}" vspace="15" height="alto" style="width:100%">
    </div>
</head>

