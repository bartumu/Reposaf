<!DOCTYPE html>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>ResposAF</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('front_end/assets/css/main.css') }}" />
</head>

<body class="single is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <!-- <header id="header">

        </header> -->
        @include('front_end.body.header')

        <!-- Menu -->
        <section id="menu">
        @include('front_end.body.menu')
        </section>

        <!-- Main -->
        <div id="main">
        @yield('main')
        </div>

        <!-- Footer -->
        <section id="footer">
            <ul class="icons">
                <li>
                    <a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a>
                </li>
                <li>
                    <a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a>
                </li>
                <li>
                    <a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a>
                </li>
                <li>
                    <a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a>
                </li>
                <li>
                    <a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a>
                </li>
            </ul>
            <p class="copyright">
                &copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.
                Images: <a href="http://unsplash.com">Unsplash</a>.
            </p>
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('front_end/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/util.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/main.js') }}"></script>
</body>

</html>