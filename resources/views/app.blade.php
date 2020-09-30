<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@3.x/css/materialdesignicons.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div id="app"></div>
	<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>