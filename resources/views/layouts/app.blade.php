<!DOCTYPE html>
<html>
<head>
    <title>漫行邮轮</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--meta(name='renderer' content='webkit')-->
    <!--meta(http-equiv="X-UA-Compatible" content="IE=10")-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/stylesheets/dist/bootstrap-grid.min.css">
    <!--link rel="stylesheet" href="/semantic/semantic.min.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css">
    <link rel="stylesheet" href="/stylesheets/dist/style.min.css">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
	<!--common header-->
	@include('layouts.header')
	<!--body to show-->
	@section('main')
	@show
	@section('scripts')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.0/js.cookie.min.js"></script>
        <!--custmised bootstrap	-->
        <script src="/javascripts/dist/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
        <script src='/javascripts/dist/vibrant.min.js' ></script>
        <script src="/javascripts/dist/main.babeled.min.js"></script>
</body>
</html>