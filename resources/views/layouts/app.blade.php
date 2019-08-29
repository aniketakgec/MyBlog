<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name','MyBlog')}}</title>

        <!-- Fonts -->
         {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">  --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}" >

    
    </head>
    <body>
        @include('inc.navbar')<br>
        <div class="container">
            @include('inc.messages')
       @yield('content')
        </div>
    </body>
</html>