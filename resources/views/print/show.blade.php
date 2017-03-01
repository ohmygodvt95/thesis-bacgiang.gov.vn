<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Page Description">
        <meta name="author" content="ohmyg">
        <title>{{ $post->title }}</title>

        <!-- Bootstrap -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body style="background: none; padding: 100px">
        <div class="container">
            <h3 class="text-center">
                <a href="">{{ $post->title }}</a>
                <br>
                <small>{{ $post->created_at }} <img height="16" src="http://meetingproceedings.com/2012/posters/apna/img/greyicons/print.png" alt="" onclick="window.print();"></small>
            </h3>
            <hr>
            <p style="font-weight: bold">{{ $post->description }}</p>
            <div>
                {!! $post->body !!}
            </div>
        </div>
        <script>
            window.print();
        </script>
    </body>
</html>
