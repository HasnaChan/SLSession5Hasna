<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="node_modules/aos/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap-icons/bootstrap-icons.css') }}" >
    <link rel="stylesheet" href="{{ asset('node_modules/boxicons/css/boxicons.min.css') }}" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" >
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">



</head>
<body>
    @include('partials.navbar')


    @yield('content')

    @include('partials.footer')



    {{-- JS --}}
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/waypoints/noframework.waypoints.js"></script>
    <script src="/main.js"></script>
    <script src="node_modules/aos/dist/aos.js"></script>
    <script> AOS.init(); </script>
    <script src="node_modules/bootstrap/dist/js/main.js"></script>

</body>
</html>
