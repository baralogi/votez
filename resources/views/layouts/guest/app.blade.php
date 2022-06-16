<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    @yield('title')

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">

    <!-- Template CSS -->
</head>

<body>
    <div class="container">
        @include('includes.guest.navbar')

        <!-- Main Content -->
        @yield('main')
    </div>

    <!-- General JS Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->

    <!-- Page Specific JS File -->
    @stack('scripts')
</body>

</html>
