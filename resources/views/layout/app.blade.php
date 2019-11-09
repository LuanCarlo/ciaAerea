<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>CIA Aérea</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    @component('navbar', [ "current" => $current ])
    @endcomponent
    <main role="main">
        @hasSection('body')
            @yield('body')
        @endif
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

</div>

<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@hasSection('javascript')
    @yield('javascript')
@endif

</body>
</html>
