<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yusti-026-PTI19A</title>

    <link rel="icon" href="{{ asset('img/stack.png') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/r_stel.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="body">
    <div class="back">
        <a href="javascript:history.back()"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
    @yield('r_home')
    @yield('r_about')
    @yield('r_porto')

    <script src="{{asset('js/jQuery.js')}}"></script>
    <script src="{{asset('js/scrolling-nav.js')}}"></script>
    <script>
        $(document).ready(function() {
            var $btn = $('#bttop');
            var $home = $('#head');
            var startpoint = $home.scrollTop() + ($home.height() + 100);

            $(window).on('scroll', function() {
                if ($(window).scrollTop() > startpoint) {
                    $btn.removeClass('d-none');
                    $btn.addClass('d-block');
                } else {
                    $btn.removeClass('d-block');
                    $btn.addClass('d-none');
                }
            })
        })
    </script>
</body>

</html>