<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Physiotherapy Clinic</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Hospital Management" name="description" />
    <meta content="Samuel Ochieng" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/fav.png">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="assets/libs/owl.carousel/assets/owl.theme.default.min.css">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/custom.css" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body class="auth-body-bg">

    @yield('content')
        

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js "></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js "></script>
        <script src="assets/libs/metismenu/metisMenu.min.js "></script>
        <script src="assets/libs/simplebar/simplebar.min.js "></script>
        <script src="assets/libs/node-waves/waves.min.js "></script>

        <!-- owl.carousel js -->
        <script src="assets/libs/owl.carousel/owl.carousel.min.js "></script>

        <!-- auth-2-carousel init -->
        <script src="assets/js/pages/auth-2-carousel.init.js "></script>

        <!-- App js -->
        <script src="assets/js/app.js "></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            // Initialize the date picker on elements with the 'datepicker' class
            flatpickr('.datepicker', {
                dateFormat: 'Y-m-d',
                maxDate: 'today',
                position: 'auto',
                inline: false,

            });
        </script>
</body>
</html>