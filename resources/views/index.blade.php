<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <link rel="stylesheet" href="{{asset('icons/fontawesome/css/all.css')}}" />
    <title>Document</title>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>
<body>
    <div id="app">
        <app></app>
    </div>



    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
