<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }} :: @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/lightgallery/css/lightgallery.min.css') }}">
    <style>
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .pt-20 {
            padding-top: 20px;
        }

        .p-10 {
            padding: 10px;
        }

        .img-center {
            text-align: center;
        }

        .pb-20 {
            padding-bottom: 20px;
        }

        #menuListTable tbody tr td {
            vertical-align: middle;
        }

        .thtf-bg {
            background-color: #000000a8;
            color: #fff
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body class="hold-transition lockscreen">
    <div class="container">
        @yield('content')
        <div class="text-center pb-20" style="background-color: #fff;">
            <b>Developed By </b><a href="mailto:rejohnbd@gmail.com">Rejohn</a></b><br>
            <strong>Copyright &copy; 2021-{{ date('Y') }}. All rights reserved.</strong>
        </div>
    </div>

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/js/lightgallery.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/js/lg-zoom.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/js/lg-rotate.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/js/lg-fullscreen.min.js') }}"></script>
    <script src="{{ asset('vendors/lightgallery/js/lg-video.min.js') }}"></script>
    <script>
        lightGallery(document.getElementById('lightgallery'), {
            selector: '.selector'
        });
        $(function() {
            $('#menuListTable').DataTable({
                responsive: true,
            });
        })
    </script>
</body>

</html>