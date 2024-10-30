<!DOCTYPE HTML>
<html>

<head>
    <title>ResposAF</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('front_end/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('front_end/assets/css/fontawesome-all.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        @include('front_end.body.header')

        <!-- Menu -->
        <section id="menu">
            @include('front_end.body.menu')
        </section>

        <!-- Main -->
        <div id="main">
            @yield('main')
        </div>

        <!-- Sidebar -->
        @include('front_end.body.siderBar')



    </div>

    <!-- Scripts -->
    <script src="{{ asset('front_end/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/util.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>