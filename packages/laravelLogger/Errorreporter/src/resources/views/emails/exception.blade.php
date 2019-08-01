<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js?autoload=true&amp;skin=sunburst&amp;lang=css" defer></script>

    </head>
    <body>
        <div>

            <div class="logo-block"><img src="{{url('/')}}/HTML/images/logo.png" alt="" class="brand-logo"> <h3 class="brand-title">TETRO</h3></div>
            <p>

            <h2><strong>Request :</strong></h2>
            <pre><code class="prettyprint">{{$request}}</code></pre>
            <br>
            <h2><strong>Exception :</strong></h2> <pre>{{$exception}}</pre>
            <br>
            <h2><strong>Headers:</strong></h2>
            <pre><code class="prettyprint">{{$header}}</code></pre>
            <br>


           <br>© Tetro Golf. All Rights Reserved.
            </p>

        </div>
    </body>
</html>
