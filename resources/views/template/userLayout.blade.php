<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yusti-026-PTI19A</title>

    <link rel="icon" href="{{ asset('img/stack.png') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stel.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="body">
    @yield('content')

    <script src="{{asset('js/jQuery.js')}}"></script>
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

        $('.link').click(function(e) {
            e.preventDefault()
            var url = $(this).attr('href')
            $('body').load(url)
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $('#loginA').click(function() {
            var emailA = $('input[name=emailA]').val()
            var passA = $('input[name=passA]').val()
            $.ajax({
                type: 'POST',
                url: '/logadm',
                data: {
                    emailA: emailA,
                    passA: passA
                },
                success: function(result) {
                    if (result.success == true) {
                        console.log(result)
                        window.location.href = '/admindash'
                    } else {
                        console.log(result)
                        alert('Gagal login Admin Page')
                    }
                }
            })
        })
    </script>
</body>

</html>