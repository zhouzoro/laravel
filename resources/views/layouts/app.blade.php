<!DOCTYPE html>
<html>
    <head>
        <title>漫行邮轮</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--meta(name='renderer' content='webkit')-->
        <meta(http-equiv="X-UA-Compatible" content="IE=10")>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="qc:admins" content="1455576553251356375" />
        <link rel="stylesheet" href="/stylesheets/dist/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/stylesheets/dist/font-awesome.min.css">
        <!--link rel="stylesheet" href="/semantic/semantic.min.css"-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css">

        @section('additional-styles')
            <link rel="stylesheet" href="/stylesheets/dist/style.min.css">
        @show
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    </head>
    <body>
        <div id="menu-hidden" class='ui left inline vertical sidebar menu hidden'>
            @include('layouts.mainMenu')
        </div>
        <div class='pusher'>
            <!--common header-->
            @include('layouts.header')

            <!--body to show-->
            @section('main')
            @show

        </div>
        @section('footer')
            @include('layouts.footer')
        @show

        @section('common-scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.0/js.cookie.min.js"></script>
            <!--custmised bootstrap -->
            <script src="/javascripts/dist/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>
        @show

        @section('additional-scripts')
            <!--script src='/javascripts/dist/vibrant.min.js' -->
            <script src="/javascripts/dist/main.babeled.min.js"></script>
        @show
    </body>
</html>