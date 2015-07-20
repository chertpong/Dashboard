<hr>
<footer>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <!-- bootstrap-star-rating lib-->
    <link media="all" rel="stylesheet" type="text/css" href={{url('css/star-rating.min.css')}}>
    <script src={{url('js/star-rating.min.js')}}></script>

    <!-- Justgage Lib-->
    <script src={{url('js/raphael.2.1.0.min.js')}}></script>
    <script src={{url('js/justgage.1.0.1.min.js')}}></script>

    <!-- Odometer Lib -->
    <link media="all" rel="stylesheet" type="text/css" href={{url('css/odometer-theme-car.css')}}>
    <script src={{url('js/odometer.min.js')}}></script>

    <p align="center">Footer area</p>
    <p align="center">powered by Laravel 5.1 and using justgage,odometer and bootstrap-star lib </p>
    @yield('footer')
</footer>